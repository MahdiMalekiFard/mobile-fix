<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    users: Array
});

const formatDate = (date) => new Date(date).toLocaleDateString('fa-IR');
</script>

<template>
    <AdminLayout title="مدیریت کاربران">
        <div class="space-y-6">

            <!-- Header Actions -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-800">لیست تمامی کاربران</h2>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                    + کاربر جدید
                </button>
            </div>

            <!-- Users Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">شناسه</th>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">نام</th>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">ایمیل</th>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600">تاریخ ثبت‌نام</th>
                            <th class="px-6 py-4 text-sm font-semibold text-slate-600 text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                        <tr v-for="user in users" :key="user.id" class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4 text-sm text-slate-500">#{{ user.id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-900">{{ user.name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ user.email }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ formatDate(user.created_at) }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        ویرایش
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                        حذف
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Empty State -->
                <div v-if="users.length === 0" class="p-12 text-center text-slate-400">
                    کاربری در سیستم یافت نشد.
                </div>
            </div>

        </div>
    </AdminLayout>
</template>
