<template>
    <div>

        <Head>
            <title>{{ movie?.title }}</title>
        </Head>
    </div>
</template>
    
<script lang="ts">
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Movie } from '../../dtos/all';

export default defineComponent({
    props: {
        movie: Movie
    },

    created() {
        console.log('received the movies', this.movie)
    }
})
</script>