<template>
    <v-app>
        <v-app-bar :elevation="3">
            <v-app-bar-nav-icon @click="showDrawer = !showDrawer"></v-app-bar-nav-icon>

            <v-app-bar-title class="text-2xl">
                <Link href="/">Vits</Link>
            </v-app-bar-title>

            <p class="pr-6">{{ seconds }}</p>
        </v-app-bar>

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

export default /*#__PURE__*/ defineComponent({
    components: { Link },

    data: () => ({ seconds: 0, showDrawer: false }),

    created() {
        setInterval(() => this.seconds++, 1000);
    }
});
</script>