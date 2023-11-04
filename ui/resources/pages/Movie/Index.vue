<template>
    <Layout page-title="Movies">
        <v-container fluid>
            <v-card
                v-for="movie in movies"
                :key="movie.id"
                border
                density="comfortable"
                variant="text"
                :title="movie.title"
                class="my-3 hover:transform scale-110 transition-all"
            >
                <v-img :src="movie.imageUrl"></v-img>

                <v-card-actions class="justify-space-between">
                    <v-btn color="primary" variant="outlined">See more</v-btn>
                    <v-btn color="secondary">Open description</v-btn>
                </v-card-actions>
            </v-card>

            <v-card
                border
                density="comfortable"
                variant="text"
                title="Map"
            >
                <v-img src="../../assets/images/image1.jpg" alt="Map Image"></v-img>
            </v-card>
        </v-container>
    </Layout>
</template>

<script lang="ts">
import { Head } from '@inertiajs/vue3';
import { Movie } from '@/assets/ts/dtos/all';
import Layout from '@/components/Layout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    components: { Head, Layout },

    props: {
        movies: Array<Movie>
    },
})
</script>