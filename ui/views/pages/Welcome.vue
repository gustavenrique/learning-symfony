<script lang="ts">
import { defineComponent } from 'vue';
import Head from '@inertiajs/vue3';
import Button from '../components/Button.vue';

interface Movie {
    id: number;
    title: string;
    releaseYear: number;
    description: string;
    imageUrl: string;
    actors: Array<any>
}

export default defineComponent({
    components: { Button },

    props: {
        movies: Array<Movie>
    },

    data: () => ({

    }),

    methods: {
        example() {
            alert('You clicked the example button!');
        }
    }
})
</script>

<template>
    <div>
        <Head title="VITS" />

        <h1>
            Welcome to this VITS project!
        </h1>

        <div class="stack">
            <h2>Stack</h2>

            <ul>
                <li>Vue 3</li>
                <li>Inertia</li>
                <li>TypeScript</li>
                <li>Symfony</li>
                <li>Sass</li>
                <li>TailwindCSS</li>
                <li>Vuetify</li>
                <li>Docker</li>
            </ul>
        </div>

        <Button 
            placeholder="Example"
            @click="example"
        />
    </div>
</template>