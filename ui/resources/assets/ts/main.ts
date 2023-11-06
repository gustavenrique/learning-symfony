import '@/assets/styles/_main.scss';

import { DefineComponent, createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import Layout from '@/components/Layout.vue';
import Vuetify from './vuetify';

createInertiaApp({
    title: (title: string) => `${title} | Vits`,

    progress: {
        delay: 0,
        includeCSS: true,
    },

    resolve: (name: string) => {
        const page = require(`@/pages/${name}`).default as DefineComponent;

        page.layout = Layout;

        return page;
    },
    
    setup({ el, App, props, plugin }) {
        createApp({ 
            name: 'Vits',
            render: () => h(App, props),
        })
            .use(plugin)
            .use(Vuetify)
            .mount(el);
    }
});