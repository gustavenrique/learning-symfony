import '@/assets/styles/_main.scss';

import { DefineComponent, createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import vuetify from './vuetify';

createInertiaApp({
    resolve: (name: string) => require(`@/pages/${name}`).default as DefineComponent,
    
    setup({ el, App, props, plugin }) {       
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el);
    }
})