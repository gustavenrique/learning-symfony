<template>
    <v-app>
        <Head :title="pageTitle + ' | Vits'" />
        
        <v-app-bar :elavation="3">
            <template v-slot:prepend>
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
            </template>

            <v-app-bar-title>Vits</v-app-bar-title>

            <template v-slot:append>
                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </template>
        </v-app-bar>

        <v-main>
            <slot />
        </v-main>

        <v-footer app>
            <v-card flat>
                <v-card-text class="text-center white--text">
                    &copy; 2023 @gustavenrique. All rights reserved.
                </v-card-text>
            </v-card>
        </v-footer>
    </v-app>
</template>

<script lang='ts'>
import { Head } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

export default defineComponent({
    components: { Head },

    props: {
        pageTitle: { required: true, type: String }
    }
})
</script>

<style lang="scss">
*,
*::after,
*::before {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body,
html {
    min-height: 100vh;
    font-family: 'JetBrains Mono', monospace;
}

nav {
    flex: .25;
    min-height: 50px !important;
    display: flex;
    align-items: center;

    .logo { 
        font-size: 1.5rem; 
        font-weight: bold;
        line-height: 50%;
        padding: 5px;
    }
}

footer {
    flex: .25;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 5px;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, .75);
    text-align: center;
}
</style>