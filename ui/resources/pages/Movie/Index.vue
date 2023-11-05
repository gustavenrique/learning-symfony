<template>
    <Head title="Movies" />
    
    <v-container fluid>
        <v-card
            v-for="movie in movies"
            :key="movie.id"
            border
            density="comfortable"
            variant="text"
            max-width="500"
            :subtitle="movie.title"
            class="my-3 mx-auto hover:scale-[1.05] transition-all"
        >
            <v-img :src="movie.imageUrl" :alt="movie.title"></v-img>

            <v-card-actions class="justify-space-between">
                <v-btn color="primary" variant="outlined">See more</v-btn>
                <v-btn color="secondary">Open description</v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script lang="ts">
import { Head } from '@inertiajs/vue3';
import { Movie } from '@/assets/ts/dtos/all';
import { defineComponent } from 'vue';

export default defineComponent({
    components: { Head, },

    props: {
        movies: Array<Movie>
    },
});
</script>