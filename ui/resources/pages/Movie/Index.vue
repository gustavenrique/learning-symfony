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
                <Link :href="'/movie/' + movie.id">
                    <v-btn color="primary" variant="outlined">See more</v-btn>
                </Link>
                
                <v-dialog max-height="500">
                    <template v-slot:activator="{ props }">
                        <v-icon 
                            icon="$info" 
                            class="pr-2"
                            v-bind="props"
                        />
                    </template>

                    <template v-slot:default="{ isActive }">
                        <v-card :subtitle="movie.title">
                            <v-card-text class="text-sm max-w-[300px]">{{ movie.description }}</v-card-text>

                            <v-card-actions>
                                <v-spacer />

                                <v-btn
                                    @click="isActive.value = false" 
                                    variant="outlined"
                                >
                                    Close
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </template>
                </v-dialog>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Movie, User } from '@/assets/ts/dtos/all';
import { defineComponent, inject } from 'vue';

export default defineComponent({
    components: { Head, Link },

    props: {
        movies: Array<Movie>,
    },

    setup() {
        return {
            user: inject('user') as User
        }
    }
});
</script>