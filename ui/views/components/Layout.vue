<script lang='ts'>
import { defineComponent } from 'vue';

export default defineComponent({
    data: () => ({

    })
});
</script>

<template>
<div>
    <nav>Navbar</nav>

    <div id="content">
        <slot />
    </div>

    <footer>Footer</footer>
</div>
</template>

<style lang="sass">
*, *::after, *::before
font-family: 'JetBrains Mono', monospace !important

body
    background-color: #263238
    color: #E1E2E1

</style>