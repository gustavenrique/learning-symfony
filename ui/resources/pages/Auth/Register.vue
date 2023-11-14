'   '<template>
    <Head title="Register" />

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
            rounded="lg"
        >
            <v-form @submit.prevent="register" ref="form">
                
                <h1 class="text-2xl text-center">Register</h1>

                <div class="text-subtitle-1 text-medium-emphasis">E-mail</div>

                <v-text-field
                    v-model="form.email"
                    density="compact"
                    placeholder="Email address"
                    prepend-inner-icon="mdi-email-outline"
                    variant="outlined"
                    :rules="validations.email"
                ></v-text-field>

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
                    placeholder="Enter your password"
                    prepend-inner-icon="mdi-lock-outline"
                    variant="outlined"
                    @click:append-inner="showPassword = !showPassword"
                    :rules="validations.password"
                ></v-text-field>

                <v-checkbox
                    v-model="form.agreed"
                    required
                    :rules="validations.agreed"
                    label="I agree with the Terms of Use"
                    class="text-sm"
                ></v-checkbox>

                <v-btn
                    block
                    class="mb-8"
                    color="blue"
                    size="large"
                    variant="tonal"
                    type="submit"
                    :disabled="loading"
                >
                    <span v-if="!loading">Sign Up</span>

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
                        href="/auth/login"
                    >
                        Already have an account? <v-icon icon="mdi-chevron-right"></v-icon>
                    </Link>
                </v-card-text>
            </v-form>
        </v-card>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { SubmitEventPromise } from 'vuetify';
import axios from 'axios';
import { DefineComponent } from 'vue';
import { VuetifyAlert } from '@/assets/ts/utils/VuetifyAlert';

export default defineComponent({
    components: { Head, Link },

    data: () => ({
        loading: false,
        alert: { title: '', text: '', type: undefined, closable: false } as VuetifyAlert,
        form: {
            username: '',
            email: '',
            password: '',
            agreed: false
        },
        showPassword: false,
        validations: {
            email: [
                (value: string) => value?.length > 10 ? true : 'You must enter a valid e-mail'
            ],
            username: [
                (value: string) => value?.length >= 2 ? true : 'You must enter the username'
            ],
            password: [
                (value: string) => value?.length > 4 ? true : 'You must enter the password'
            ],
            agreed: [
                (value: boolean) => value ? true : 'You must agree with the terms and conditions'
            ],
        }
    }),

    methods: {
        async register(event: SubmitEventPromise) {
            let error: boolean = false;

            try {
                const form = this.$refs.form as DefineComponent;

                if (!form.isValid) return;

                this.loading = true;

                const { data: ok }: { data: boolean } = await axios.post('/api/auth/register', this.form);

                if (!ok) error = true;

                router.visit('/auth/login');
            } catch (e) {
                error = true;
                console.error(e);
            } finally {
                this.loading = false;

                if (error) 
                    this.alert = {
                        title: 'Failed Registering',
                        text: 'Something went wrong while trying to create the account',
                        type: 'error',
                        closable: true
                    };
            }
        }
    },
});
</script>