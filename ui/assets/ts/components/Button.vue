<template>
    <button class='btn'>{{ placeholder }}</button>
</template>

<script lang='ts'>
export default {
    props: { 
        placeholder: { type: String, required: true }, 
        callback: { type: Function, require: true }
    },

    data: () => ({
        
    })
}
</script>

<style scoped lang="sass">

</style>