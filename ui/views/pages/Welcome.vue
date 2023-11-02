<template>
    <Layout>
        <Head title="Welcome | VITS" />

        <div class="welcome">
            <h1 style="text-align: center">
                Welcome to VITS!
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
                style="position: absolute; left: 50%; transform: translate(-50%, 50%);" 
                class="primary"
                placeholder="Example" 
                @click="example" 
            />
        </div>
    </Layout>
</template>

<script lang="ts">
import Button from '../components/Button.vue';
import Layout from '../components/Layout.vue';
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';

export default defineComponent({
    components: { Button, Head, Layout },

    data: () => ({

    }),

    methods: {
        example() {
            alert('You clicked the example button!');
        }
    }
})
</script>

<style lang="scss">
@import '../assets/scss/variables';

.welcome {
    .stack {
        padding: 10px 5px;
        border-radius: 5px;
        width: clamp(100px, 50%, 200px);
        box-shadow: 1px 1px 3px rgba(0, 0, 0, .75);
        margin: 1rem auto;
        transition: all .5s;
        background-color: $primary-color;

        &:hover {
            transform: scale(1.05);
        }

        h2 {
            margin-bottom: 1rem;
        }

        ul {
            list-style-type: none;

            li {
                padding: 5px;
                background-color: $primary-color;
                color: $bg-light;
                transition: all .5s;

                &:hover {
                    background-color: $light-color;
                    color: $bg-less-light;
                }
            }
        }
    }
}
</style>