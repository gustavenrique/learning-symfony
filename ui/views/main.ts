import { createInertiaApp } from "@inertiajs/vue3";
import { DefineComponent, createApp, h } from "vue";

createInertiaApp({
    resolve: (name: string) => require(`./pages/${name}`).default as DefineComponent,
    
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    }
})