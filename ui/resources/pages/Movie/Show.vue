<template>
    <Head :title="movie?.title ?? 'Movie Not Found'" />

    <v-alert
        v-if="alert.text"
        v-bind="alert"
        variant="outlined"
        class="m-4"
    >
    </v-alert>

    <v-container
        v-if="movie"
        class="px-4"
    >
        <v-card-title>{{ movie.title }}</v-card-title>

        <v-img :src="movie.imageUrl"></v-img>

        <v-container>
            <v-card-subtitle>Description</v-card-subtitle>

            <v-card-text class="text-sm">{{ movie.description }}</v-card-text>
        </v-container>

        <v-container>
            <v-card-subtitle>Actors</v-card-subtitle>

            <v-slide-group
                selected-class="bg-info"
                show-arrows
                v-model="model"
            >
                <v-slide-group-item
                    v-for="actor in movie.actors"
                    v-slot="{ isSelected, toggle, selectedClass }"
                >
                    <v-card
                        color="grey-lighten-1"
                        :class="['ma-4', selectedClass]"
                        height="200"
                        width="100"
                        @click="toggle"
                    >
                        <div class="d-flex fill-height align-center justify-center">
                            <v-scale-transition>
                                <p v-if="isSelected">{{ actor }}</p>
                            </v-scale-transition>
                        </div>
                    </v-card>
                </v-slide-group-item>
            </v-slide-group>
        </v-container>
    </v-container>
</template>
    
<script lang="ts">
import { PropType, defineComponent } from 'vue';
import Layout from '@/components/Layout.vue'
import { Movie } from '@/assets/ts/dtos/all';
import { Head } from '@inertiajs/vue3';

type VuetifyAlert = {
    title: string,
    text: string,
    type: "error" | "success" | "warning" | "info" | undefined,
    closable: boolean,
}

export default defineComponent({
    components: { Layout, Head },

    props: {
        movie: Object as PropType<Movie>
    },

    data: () => ({
        alert: { title: '', text: '', type: undefined, closable: false } as VuetifyAlert,
        model: null
    }),

    created() {
        if (!this.movie)
            this.alert = {
                title: 'Movie not found!',
                text: 'The movie you are trying to see doesn\'t exist',
                closable: false,
                type: 'error'
            }
    }
})
</script>