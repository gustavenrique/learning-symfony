<script lang='ts'>
import { defineComponent } from 'vue';

export default defineComponent({
    data: () => ({

    })
});
</script>

<template>
    <div id="layout">
        <nav>
            <div class="logo">Vits</div>
            <div class="burger-btn"></div>
        </nav>

        <div id="content">
            <slot />
        </div>

        <footer>
            2023 - All right reserved to &lt;/&#64;gustavenrique&gt;
        </footer>
    </div>
</template>

<style lang="scss">
@import '../assets/scss/variables';

*,
*::after,
*::before {
    font-family: 'JetBrains Mono', monospace !important;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
    background-color: $primary-color;
    color: $bg-less-light;
}

#layout,
body,
html {
    min-height: 100vh;
}

#layout {
    display: flex;
    flex-direction: column;

    nav {
        flex: .5;
        min-height: 50px !important;
        display: flex;
        align-items: center;

        .logo { 
            font-size: 1.5rem; 
            font-weight: bold;
            line-height: 50%;
            padding: 5px;
        }
    }

    #content {
        flex: 3;
        background-color: $light-color;
        padding: 1rem .5rem;
    }

    footer {
        flex: .5;
        padding: 10px 5px;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, .75);
        text-align: center;
    }
}
</style>