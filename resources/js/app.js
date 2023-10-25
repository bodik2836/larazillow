import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import { ZiggyVue } from 'ziggy'
import { InertiaProgress } from "@inertiajs/progress"

InertiaProgress.init({
    delay: 0,
    color: '#8c33ff',
    includeCSS: true,
    showSpinner: true,
})

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || DefaultLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})
