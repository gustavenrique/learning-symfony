<template>
    <Layout page-title="Movies">
        <ul>
            <li v-for="movie in movies" :key="movie.id">{{ movie.title }}</li>
        </ul>
    </Layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '@/components/Layout.vue';
import { Movie } from '@/assets/ts/dtos/all';

export default defineComponent({
    components: { Head, Layout },

    props: {
        movies: Array<Movie>
    },
})
</script>