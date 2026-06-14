<script setup>
import {Link, router, usePage} from '@inertiajs/vue3';
import {useI18n} from 'vue-i18n';
import {computed} from 'vue';

defineProps({
    title: {
        type: String,
        default: 'پنل مدیریت'
    }
});

const {locale} = useI18n();
const page = usePage();
const currentLocale = computed(() => page.props.locale);
locale.value = currentLocale.value;

const changeLanguage = (newLang) => {
    router.get(route('language.switch', newLang), {}, {
        onSuccess: () => {
            locale.value = newLang;
            document.documentElement.dir = newLang === 'fa' ? 'rtl' : 'ltr';
            document.documentElement.lang = newLang;
        }
    });
};
if (typeof document !== 'undefined') {
    document.documentElement.dir = locale.value === 'fa' ? 'rtl' : 'ltr'
}
</script>

<template>
    <div :dir="locale === 'fa' ? 'rtl' : 'ltr'" class="min-h-screen bg-slate-100 font-sans">
        <div class="flex min-h-screen">

            <!-- Sidebar -->
            <aside class="hidden md:flex md:w-64 md:flex-col bg-slate-900 text-white">
                <div class="flex h-16 items-center justify-center border-b border-slate-800">
                    <h1 class="text-lg font-bold">
                        {{ $t('sidebar_title') }}
                    </h1>
                </div>

                <nav class="flex-1 space-y-1 px-3 py-4">
                    <Link
                        href="/admin"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 hover:text-white transition"
                    >
                        {{ $t('dashboard') }}
                    </Link>

                    <Link
                        :href="route('admin.users.index')"
                        :class="{'bg-slate-800 text-white': $page.component === 'Admin/Users/Index'}"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 hover:text-white transition"
                    >
                        {{ $t('users') }}
                    </Link>

                    <Link
                        href="#"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 hover:text-white transition"
                    >
                        {{ $t('orders') }}
                    </Link>

                    <Link
                        href="#"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 hover:text-white transition"
                    >
                        {{ $t('blogs') }}
                    </Link>

                    <Link
                        href="#"
                        class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-200 hover:bg-slate-800 hover:text-white transition"
                    >
                        {{ $t('settings') }}
                    </Link>
                </nav>
            </aside>

            <!-- Main -->
            <div class="flex flex-1 flex-col">

                <!-- Header -->
                <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">
                            {{ title }}
                        </h2>
                    </div>

                    <button @click="changeLanguage(locale === 'fa' ? 'en' : 'fa')" class="px-3 py-1 border rounded-md text-xs hover:bg-gray-50">
                        {{ locale === 'fa' ? 'انگلیسی' : 'Persian' }}
                    </button>

                    <div class="flex items-center gap-3">
                        <span class="text-sm text-slate-500">
                            {{ $t('manager') }}
                        </span>

                        <div class="h-9 w-9 rounded-full bg-slate-900 text-white flex items-center justify-center text-sm font-bold">
                            A
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-6">
                    <slot/>
                </main>
            </div>
        </div>
    </div>
</template>
