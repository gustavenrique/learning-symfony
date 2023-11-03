<template>
    <Layout page-title="Movies">
        <ul>
            <li v-for="movie in movies" :key="movie.id">{{ movie.title }}</li>
        </ul>
    </Layout>
</template>

<script lang="ts">
import { Head } from '@inertiajs/vue3';
import { Movie } from '@/assets/ts/dtos/all';
import Layout from '@/components/Layout.vue';

export default {
    components: { Head, Layout },

    props: {
        movies: Array<Movie>
    },
}
</script>