import '@mdi/font/css/materialdesignicons.css';

import 'vuetify/styles';
import { createVuetify, ThemeDefinition } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import { aliases, mdi } from 'vuetify/iconsets/mdi';

const darkTheme: ThemeDefinition = {
    dark: true,
    colors: {
        primary: '#427D9D',
        secondary: '#DDF2FD'
    }
}

export default createVuetify({ 
    components,
    directives,
    theme: {
        defaultTheme: 'dark',
        themes: {
            dark: darkTheme
        }
    },
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi
        }
    },
});