<template>
    <Head title="Login" />

    <v-alert
        v-if="alert.text"
        v-bind="alert"
        variant="outlined"
        class="m-4"
    />

    <div class="h-screen flex align-center justify-center">
        <v-card
            class="pa-12 pb-6"
            elevation="8"
            max-width="448"
            min-width="350"
            rounded="lg"
        >
            <v-form @submit.prevent="login" ref="form">
                
                <h1 class="text-2xl text-center">Login</h1>

                <div class="text-subtitle-1 text-medium-emphasis">Username</div>

                <v-text-field
                    v-model="form.username"
                    density="compact"
                    placeholder="Username"
                    prepend-inner-icon="mdi-account"
                    variant="outlined"
                    :rules="validations.username"
                    :disabled="loading"
                ></v-text-field>

                <div class="text-subtitle-1 text-medium-emphasis d-flex align-center">
                    Password
                </div>

                <v-text-field
                    v-model="form.password"
                    :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
                    :type="showPassword ? 'text' : 'password'"
                    density="compact"
                    placeholder="Password"
                    prepend-inner-icon="mdi-lock-outline"
                    variant="outlined"
                    @click:append-inner="showPassword = !showPassword"
                    :rules="validations.password"
                    :disabled="loading"
                ></v-text-field>

                <v-btn
                    block
                    class="mb-8"
                    color="blue"
                    size="large"
                    variant="tonal"
                    type="submit"
                    :disabled="loading"
                >
                    <span v-if="!loading">Log In</span>

                    <v-progress-circular 
                        v-if="loading" 
                        indeterminate 
                        color="primary" 
                        class="pl-2"
                    ></v-progress-circular>
                </v-btn>

                <v-card-text class="text-center">
                    <Link
                        class="text-blue text-decoration-none"
                        href="/auth/register"
                    >
                        Don't yet have an account? <v-icon icon="mdi-chevron-right"></v-icon>
                    </Link>
                </v-card-text>
            </v-form>
        </v-card>
    </div>
</template>

<script lang="ts">
import { DefineComponent, PropType, defineComponent } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3'
import { VuetifyAlert } from '@/assets/ts/utils/VuetifyAlert';
import { SubmitEventPromise } from 'vuetify';
import axios, { AxiosResponse } from 'axios';

type ErrorProp = Object | null;
type LastUsernameProp = string | null;

export default defineComponent({
    components: { Head, Link },

    props: {
        csrf_token: String,
        last_username: String as PropType<LastUsernameProp>,
        error: Object as PropType<ErrorProp>
    },

    data: () => ({
        loading: false,
        alert: { title: '', text: '', type: undefined, closable: false } as VuetifyAlert,
        form: {
            username: '',
            password: '',
        },
        showPassword: false,
        validations: {
            username: [
                (value: string) => value?.length >= 2 ? true : 'You must enter the username'
            ],
            password: [
                (value: string) => value?.length > 4 ? true : 'You must enter the password'
            ],
        }
    }),

    methods: {
        async login(event: SubmitEventPromise) {
            const error = {
                occurred: false,
                message: ''
            };

            try {
                const form = this.$refs.form as DefineComponent;

                if (!form.isValid) return;

                this.loading = true;

                const { data, status }: AxiosResponse = await axios
                    .post(
                        '/api/auth/login', {
                            ...this.form,
                            _csrf_token: this.csrf_token
                        },
                    );

                if ((status >= 200 && status <= 299) || status == 302)
                    location.reload();
            } catch (e) {
                console.error(e);

                if (e != null && typeof e === 'object' && 'message' in e) {
                    const errorMessage = e.message;

                    if (typeof errorMessage === 'string') {
                        error.message = errorMessage;
                        error.occurred = true;
                    }
                }
            } finally {
                this.loading = false;

                if (error.occurred) 
                    this.alert = {
                        title: 'Failed to Login',
                        text: error.message || 'Something went wrong while trying to log you in',
                        type: 'error',
                        closable: true
                    };
            }
        }
    }
});
</script>