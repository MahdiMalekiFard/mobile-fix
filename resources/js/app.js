import './bootstrap';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from 'ziggy-js';
import {createI18n} from 'vue-i18n';
import fa from './locales/fa.json';
import en from './locales/en.json';

const i18n = createI18n({
    legacy: false, // استفاده از Composition API
    locale: 'fa',  // زبان پیش‌فرض
    fallbackLocale: 'en',
    messages: {fa, en}
});

void createInertiaApp({
    resolve: name =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        ),

    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n)
            .mount(el);
    }
});
