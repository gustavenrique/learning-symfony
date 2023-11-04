<template>
    <v-app>
        <Head :title="pageTitle + ' | Vits'" />
        
        <v-app-bar :elavation="3">
            <v-app-bar-title class="text-2xl">Vits</v-app-bar-title>

            <p class="">{{ seconds }}</p>

            <!-- TODO: implement sidebar - https://vuetifyjs.com/en/components/lists/#nav -->
            <template v-slot:append>
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
            </template>
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
import { Head } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

export default defineComponent({
    components: { Head },

    props: {
        pageTitle: { required: true, type: String }
    },

    data: () => ({ seconds: 0 }),

    created() {
        setInterval(() => this.seconds++, 1000);
    }
})
</script>