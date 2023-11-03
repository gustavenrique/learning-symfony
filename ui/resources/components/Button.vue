<template>
    <button class='btn'>{{ placeholder }}</button>
</template>

<script lang='ts'>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        placeholder: { type: String, required: true }
    },

    data: () => ({

    })
})
</script>

<style lang="scss" scoped>
@import '../assets/scss/variables';

.btn {
    padding: 10px;
    border-radius: 5px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, .75);
    border: none;
    transition: transform .5s;

    &:hover {
        cursor: pointer;
        transform: scale(1.05);
    }

    &.primary {
        background-color: $primary-color;
        color: $bg-light;
    }
}
</style>