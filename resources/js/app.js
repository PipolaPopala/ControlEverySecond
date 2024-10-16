import './bootstrap';
import '../css/app.css'

import { createApp, h } from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Layout from "@/layouts/Layout.vue";

createInertiaApp({
    title: (title) => `CES | ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./pages/**/*.vue', { eager: true })
        let page = pages[`./pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        delay: 250, // The delay after which the progress bar will appear, in milliseconds
        color: '#fff', // The color of the progress bar
        includeCSS: true, // Whether to include the default NProgress styles
        showSpinner: false, // Whether the NProgress spinner will be shown
    },
})
