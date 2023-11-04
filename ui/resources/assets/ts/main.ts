import '@/assets/styles/_main.scss';

import { DefineComponent, createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import vuetify from './vuetify';
import Layout from '@/components/Layout.vue';

createInertiaApp({
    resolve: (name: string) => {
        const page = require(`@/pages/${name}`).default as DefineComponent;

        const renderPage: Function = h;

        page.layout ??= renderPage(Layout, { pageTitle: page.pageTitle }, () => page);

        return page;
    },
    
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el);
    }
});