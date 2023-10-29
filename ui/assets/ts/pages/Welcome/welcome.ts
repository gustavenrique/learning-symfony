import '../../../sass/app.sass'

import Welcome from './Welcome.vue';
import { 
    DefineComponent, 
    createApp, 
    h as vnode 
} from "vue";

const app = createApp(Welcome);

app.mount('#app');