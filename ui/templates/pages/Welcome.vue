<template>
    <div>
        <p>
            Welcome to this Vue + Symfony project!
        </p>

        <Button 
            placeholder="Example"
            :callback="example"
        />
    </div>
</template>

<script lang="ts">
import Button from '../components/Button.vue';

export default {
    components: { Button },

    data: () => ({

    }),

    methods: {
        example() {
            alert('You clicked the example button!');
        }
    }
}
</script>