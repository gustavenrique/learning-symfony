<template>
    <v-app>
        <v-app-bar :elevation="2" density="comfortable">
            <v-app-bar-nav-icon @click="showSidebar = !showSidebar"></v-app-bar-nav-icon>

            <v-app-bar-title class="text-2xl">
                <Link href="/">Vits</Link>
            </v-app-bar-title>

            <p class="pr-6">{{ seconds }}</p>

            <template v-slot:append>
                <v-icon icon="mdi-theme-light-dark" @click="toggleTheme"></v-icon>
            </template>
        </v-app-bar>

        <v-navigation-drawer v-model="showSidebar">
            <v-list-item v-if="!loading" :title="user?.username ?? 'Guest'" prepend-icon="mdi-account-circle"></v-list-item>
            <v-progress-circular 
                v-else
                indeterminate 
                color="primary" 
                class="pl-2"
            ></v-progress-circular>

            <v-divider />

            <v-list density="compact" nav>
                <Link href="/">
                    <v-list-item title="Home" prepend-icon="mdi-home" value="home"></v-list-item>
                </Link>

                <v-progress-circular 
                    v-if="loading" 
                    indeterminate 
                    color="primary" 
                    class="pl-2"
                ></v-progress-circular>

                <Link 
                    href='/api/auth/logout' 
                    @click='user = null' 
                    v-else-if="user?.username"
                >
                    <v-list-item title="Logout" prepend-icon="mdi-logout" value="logout"></v-list-item>
                </Link>

                <div v-else>
                    <Link href="/auth/register">
                        <v-list-item title="Register" prepend-icon="mdi-account-plus" value="signup"></v-list-item>
                    </Link>

                    <Link href="/auth/login">
                        <v-list-item title="Login" prepend-icon="mdi-login" value="login"></v-list-item>
                    </Link>
                </div>
            </v-list>
        </v-navigation-drawer>

        <v-main>
            <slot />
        </v-main>

        <v-card flat>
            <v-card-text class="text-center white--text">
                &copy; 2023 @gustavenrique. All rights reserved.
            </v-card-text>
        </v-card>
    </v-app>
</template>

<script lang='ts'>
import { defineComponent, provide, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useTheme } from 'vuetify';
import { User } from '@/assets/ts/dtos/all';
import axios, { AxiosResponse } from 'axios';

export default /*#__PURE__*/ defineComponent({
    components: { Link },

    setup: () => {
        const user = ref(null as User);

        provide('user', user);

        return {
            theme: useTheme(),    
            user,
        }
    },  

    data: () => ({ 
        seconds: 0, 
        showSidebar: false,
        loading: false,
    }),

    created() {
        setInterval(() => this.seconds++, 1000);

        this.getCurrentUser();
    },

    methods: {
        toggleTheme() {
            const theme = this.theme.global;

            theme.name.value = theme.current.value.dark ? 'light' : 'dark';
        },

        async getCurrentUser() {
            try {
                this.loading = true;

                const { data: user }: AxiosResponse = await axios.get('/api/auth/whoami');

                this.user = Object.freeze(user) as User;
            } catch (e) {
                console.error(e);
            } finally {
                this.loading = false;
            }
        }
    },
});
</script>