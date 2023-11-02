<template>
    <div>

        <Head title="Movies" />

        <ul>
            <li v-for="movie in movies" :key="movie.id">{{ movie.title }}</li>
        </ul>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Movie } from '../../dtos/all';
import { Head } from '@inertiajs/vue3';

export default defineComponent({
    components: { Head },

    props: {
        movies: Array<Movie>
    },
})
</script>