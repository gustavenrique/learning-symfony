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
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3'
import { VuetifyAlert } from '@/assets/ts/utils/VuetifyAlert';
import { SubmitEventPromise } from 'vuetify';

export default defineComponent({
    components: { Head },

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
        login(event: SubmitEventPromise) {
            console.log('gonna log in!');
        }
    }
});
</script>