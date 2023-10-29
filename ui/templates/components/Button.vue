<template>
    <button class='btn' @click='callback'>{{ placeholder }}</button>
</template>

<script>
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