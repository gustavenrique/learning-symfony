import { createInertiaApp } from "@inertiajs/vue3";
import { DefineComponent, createApp, h } from "vue";
import {} from '@/assets/ts/dtos/all';

createInertiaApp({
    resolve: (name: string) => require(`@/pages/${name}`).default as DefineComponent,
    
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    }
})