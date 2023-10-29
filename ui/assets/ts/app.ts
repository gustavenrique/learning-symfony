// import './styles/app.sass';
// import { createInertiaApp } from "@inertiajs/vue3";
// import { DefineComponent, createApp, h } from "vue";

// createInertiaApp({
//     resolve: name => require(`../templates/pages/${name}`) as DefineComponent,
//     setup({ el, App, props, plugin }) {
//         createApp({ render: () => h(App, props)})
//             .use(plugin)
//             .mount(el);
//     }
// });

import { createApp } from 'vue';
import Welcome from '../../templates/pages/Welcome.vue';

import '../sass/app.sass';

const app = createApp(Welcome);

app.mount('#app');