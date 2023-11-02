<template>
    <Layout :pageTitle="movie?.title ?? ''">

    </Layout>
</template>
    
<script lang="ts">
import { PropType, defineComponent } from 'vue';
import Layout from '@/components/Layout.vue';
import { Movie } from '@/assets/ts/dtos/all';

export default defineComponent({
    components: { Layout },

    props: {
        movie: Object as PropType<Movie>
    },

    created() {
        console.dir(this.movie)
    }
})
</script>