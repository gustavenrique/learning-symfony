<template>
    <Head title="Welcome!" />

    <h1 class="text-3xl lg:text-4xl font-extrabold my-4 text-center
        bg-clip-text text-transparent bg-gradient-to-r from-sky-400 to-blue-50
        hover:bg-gradient-to-l transition-all block mx-auto w-100"
    >
        Welcome to Vits!
    </h1>

    <div class="flex flex-col align-center md:flex-row justify-center gap-4 my-4">
        <div>
            <v-card class="mx-auto md:ml-auto hover:scale-[1.02] transition-all">
                <v-list density="compact" class="w-[300px]">
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
        </div>
        
        <div>
            <div class="max-w-sm mx-auto md:ml-auto">
                <v-container class="flex align-center justify-center flex-col gap-4 text-sm text-justify">
                    <p>
                        This project was made in order to <span class="text-sky-400">learn the basic features of Symfony framework</span>.
                        It contains the main things an application should have, such as auth, CRUD operations,
                        theme switching, form validation and many more.
                    </p>
                    <p>
                        Essentially, this app should be a blog about movies, but it isn't. However,
                        in generall you are gonna see stuff like movies and actors here.
                    </p>
                    <p>
                        The name Vits actually stands for <span class="text-sky-400">Vue, Inertia, TypeScript and Symfony</span>, 
                        which are the main technologies used in the stack.
                    </p>
                </v-container>

                <v-btn 
                    prepend-icon="$vuetify" 
                    variant="outlined" 
                    class="my-4 mx-auto flex justify-center" 
                    color="primary"
                >
                    <Link href="/movie" preserve-scroll>
                        Explore
                    </Link>
                </v-btn>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Button from '@/components/Button.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

type Technology = { icon: string, name: string }

export default defineComponent({
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