<template>
    <Head title="Register" />

    <div>
        <v-card
            class="mx-auto mt-4 pa-12 pb-8"
            elevation="8"
            max-width="448"
            rounded="lg"
        >
            <div class="text-subtitle-1 text-medium-emphasis">E-mail</div>

            <v-text-field
                v-model="form.email"
                density="compact"
                placeholder="Email address"
                prepend-inner-icon="mdi-email-outline"
                variant="outlined"
            ></v-text-field>

            <div class="text-subtitle-1 text-medium-emphasis">Username</div>

            <v-text-field
                v-model="form.username"
                density="compact"
                placeholder="Username"
                prepend-inner-icon="mdi-account"
                variant="outlined"
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
            ></v-text-field>

            <v-checkbox
                v-model="form.agreed"
                label="Do you agree?"
                required
            ></v-checkbox>

            <v-btn
                block
                class="mb-8"
                color="blue"
                size="large"
                variant="tonal"
            >
                Sign Up
            </v-btn>

            <v-card-text class="text-center">
                <a
                    class="text-blue text-decoration-none"
                    href="#"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    Already have an account? <v-icon icon="mdi-chevron-right"></v-icon>
                </a>
            </v-card-text>
        </v-card>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';

export default defineComponent({
    components: { Head },

    data: () => ({
        form: {
            username: '',
            email: '',
            password: '',
            agreed: false
        },
        showPassword: false
    }),

    methods: {
        clearForm() {
            this.form = {
                username: '',
                email: '',
                password: '',
                agreed: false
            };   
        }
    }
});
</script>