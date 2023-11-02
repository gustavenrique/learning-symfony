<script lang='ts'>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        placeholder: { type: String, required: true },
        callback: { type: Function, require: true }
    },

    data: () => ({

    })
})
</script>

<template>
    <button class='btn'>{{ placeholder }}</button>
</template>

<!-- <style lang="sass" scoped>
.btn
    padding: 10px
    border-radius: 5px
    box-shadow: 3px 3px 3px rgba(0, 0, 0, .75)
    border: none
</style> -->