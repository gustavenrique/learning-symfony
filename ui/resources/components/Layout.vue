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
            <v-list-item :title="userInfo?.username ?? 'Guest'" prepend-icon="mdi-account-circle"></v-list-item>

            <v-divider />

            <v-list density="compact" nav>
                <Link href="/">
                    <v-list-item title="Home" prepend-icon="mdi-home" value="home"></v-list-item>
                </Link>

                <Link href="/api/auth/logout" v-if="userInfo?.username">
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
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useTheme } from 'vuetify';
import { User } from '@/assets/ts/dtos/all';

export default /*#__PURE__*/ defineComponent({
    setup() {
        return { theme: useTheme() };
    },  

    components: { Link },

    data: () => ({ 
        seconds: 0, 
        showSidebar: false
    }),

    created() {
        setInterval(() => this.seconds++, 1000);
    },

    methods: {
        toggleTheme() {
            this.theme.global.name.value = this.theme.global.current.value.dark ? 'light' : 'dark';
        }
    },

    computed: {
        userInfo() {
            const user: unknown = this.$attrs?.user;

            return user as User|null;
        }
    }
});
</script>