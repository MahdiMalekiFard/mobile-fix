<script setup>
defineProps({
    users: Array
});
</script>

<template>
    <!-- استفاده از کلاس‌های تلویند v4 -->
    <div class="min-h-screen bg-gray-50 p-8" dir="rtl">
        <div class="max-w-4xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold text-gray-800 border-r-4 border-blue-600 pr-4">
                    مدیریت کاربران
                </h1>
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                    تعداد کل: {{ users.length }}
                </span>
            </div>

            <!-- کارت جدول -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full text-right border-collapse">
                    <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="p-4 text-gray-600 font-semibold">شناسه</th>
                        <th class="p-4 text-gray-600 font-semibold">نام و نام خانوادگی</th>
                        <th class="p-4 text-gray-600 font-semibold">ایمیل</th>
                        <th class="p-4 text-gray-600 font-semibold text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    <!-- حلقه روی کاربران -->
                    <tr v-for="user in users" :key="user.id" class="hover:bg-blue-50/50 transition-colors">
                        <td class="p-4 text-gray-500 font-mono text-sm">#{{ user.id }}</td>
                        <td class="p-4">
                            <div class="font-medium text-gray-900">{{ user.name }}</div>
                        </td>
                        <td class="p-4 text-gray-600">{{ user.email }}</td>
                        <td class="p-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                ویرایش
                            </button>
                        </td>
                    </tr>

                    <!-- نمایش در صورت نبود داده -->
                    <tr v-if="users.length === 0">
                        <td colspan="4" class="p-12 text-center text-gray-400">
                            <div class="flex flex-col items-center">
                                <span class="text-4xl mb-2">empty</span>
                                <p>هیچ کاربری در دیتابیس یافت نشد.</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</template>
