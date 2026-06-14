<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    stats: {
        type: Object,
        default: () => ({
            users: 0,
            orders: 0,
            blogs: 0,
            income: 0
        })
    }
});
</script>

<template>
    <AdminLayout :title="$t('dashboard')">
        <div class="space-y-6">

            <!-- Welcome -->
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">
                <h1 class="text-2xl font-bold text-slate-900">
                    {{ $t('welcome') }} 👋
                </h1>
                <p class="mt-2 text-slate-500">
                    {{ $t('welcome_message') }}
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-200">
                    <p class="text-sm text-slate-500">{{ $t('users') }}</p>
                    <p class="mt-3 text-3xl font-bold text-slate-900">
                        {{ $n(stats.users) }}
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-200">
                    <p class="text-sm text-slate-500">{{ $t('orders') }}</p>
                    <p class="mt-3 text-3xl font-bold text-slate-900">
                        {{ $n(stats.orders) }}
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-200">
                    <p class="text-sm text-slate-500">{{ $t('blogs') }}</p>
                    <p class="mt-3 text-3xl font-bold text-slate-900">
                        {{ $n(stats.blogs) }}
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm border border-slate-200">
                    <p class="text-sm text-slate-500">{{ $t('income') }}</p>
                    <p class="mt-3 text-3xl font-bold text-emerald-600">
                        {{ $n(stats.income) }} {{ $t('currency') }}
                    </p>
                </div>
            </div>

            <!-- Placeholder -->
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">
                <h2 class="text-lg font-bold text-slate-800">
                    {{ $t('situation') }}
                </h2>

                <div class="mt-4 h-64 rounded-xl border-2 border-dashed border-slate-200 flex items-center justify-center text-slate-400">
                    {{$t('message')}}
                </div>
            </div>

        </div>
    </AdminLayout>
</template>
