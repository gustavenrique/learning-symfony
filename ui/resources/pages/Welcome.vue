<template>
    <v-container class="flex align-center">
        <h1 class="text-3xl lg:text-4xl text-center font-extrabold my-4 
            bg-clip-text text-transparent bg-gradient-to-r from-sky-400 to-blue-50
            hover:bg-gradient-to-l transition-all inline-block mx-auto"
        >
            Welcome to Vits!
        </h1>
    </v-container>

    <v-card class="my-4 mx-auto hover:scale-[1.03] transition-all" max-width="300">
        <v-list density="compact">
            <v-list-subheader>Stack</v-list-subheader>

            <v-list-item
                v-for="technology in stack"
                :key="technology.name"
                :value="technology"
                :prepend-icon="technology.icon"
            >
                <v-list-item-title v-text="technology.name"></v-list-item-title>
            </v-list-item>
        </v-list>
    </v-card>
    
    <Link href="/movie" class="flex justify-center" preserve-scroll>
        <v-btn 
            prepend-icon="$vuetify" 
            variant="outlined" 
            class="my-4 mx-auto" 
            color="primary"
        >
            Explore
        </v-btn>
    </Link>
</template>

<script lang="ts">
import Button from '@/components/Button.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

type Technology = { icon: string, name: string }

export default defineComponent({
    pageTitle: 'Welcome!',

    components: { Button, Head, Link },

    data: () => ({
        stack: [
            { icon: 'mdi-vuejs', name: 'Vue' },
            { icon: 'mdi-vuetify', name: 'Vuetify' },
            { icon: 'mdi-sass', name: 'SASS' },
            { icon: 'mdi-tailwind', name: 'TailwindCSS' },
            { icon: 'mdi-language-typescript', name: 'TypeScript' },
            { icon: 'mdi-link', name: 'Inertia' },
            { icon: 'mdi-symfony', name: 'Symfony' },
            { icon: 'mdi-docker', name: 'Docker' },
            { icon: 'mdi-database', name: 'MySQL' },
            { icon: 'mdi-aws', name: 'AWS' },
            { icon: 'mdi-sync', name: 'Github Actions' },
        ] as Technology[]
    }),

    methods: {
        example() {
            alert('You clicked the example button!');
        }
    }
})
</script>