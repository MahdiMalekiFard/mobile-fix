<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {router, useForm, Link} from '@inertiajs/vue3';
import { Pencil, Trash2, UserPlus } from 'lucide-vue-next';
import {ref} from 'vue';
import Modal from '@/Components/Modal.vue';

defineProps({
    users: Array
});

// مدیریت نمایش مودال
const showCreateModal = ref(false);

// فرم ایجاد کاربر
const form = useForm({
    name: '',
    email: '',
    password: ''
});

const createUser = () => {
    form.post(route('admin.users.store'), {
        onSuccess: () => {
            showCreateModal.value = false;
            form.reset();
        }
    });
};

const formatDate = (date) => new Date(date).toLocaleDateString('fa-IR');
const deleteUser = (id) => {
    if (confirm('آیا از حذف این کاربر اطمینان دارید؟')) {
        router.delete(route('admin.users.destroy', id), {
            preserveScroll: true,
            onSuccess: () => {
                // می‌توانید اینجا یک پیام موفقیت نمایش دهید
            }
        });
    }
};
</script>

<template>
    <AdminLayout title="مدیریت کاربران">
        <div class="space-y-6">

            <!-- Header Actions -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-800">لیست تمامی کاربران</h2>
                <button @click="showCreateModal = true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                    <UserPlus :size="18"/>
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
                                <div class="flex items-center justify-center gap-2 whitespace-nowrap">
                                    <Link
                                        :href="route('admin.users.edit', user.id)"
                                        class="inline-flex items-center justify-center px-3 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                    >
                                        <Pencil :size="18" class="group-hover:scale-110 transition-transform" />
                                    </Link>
                                    <button
                                        type="button"
                                        @click="deleteUser(user.id)"
                                        class="inline-flex items-center justify-center px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition"
                                    >
                                        <Trash2 :size="18" class="group-hover:scale-110 transition-transform" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <Modal :show="showCreateModal" title="افزودن کاربر جدید" @close="showCreateModal = false">
                        <form @submit.prevent="createUser" class="space-y-4">
                            <div>
                                <label class="block mb-1">نام و نام خانوادگی</label>
                                <input v-model="form.name" type="text" class="w-full border rounded-lg p-2"/>
                                <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                            </div>
                            <div>
                                <label class="block mb-1">ایمیل</label>
                                <input v-model="form.email" type="email" class="w-full border rounded-lg p-2 text-left" dir="ltr"/>
                                <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</div>
                            </div>
                            <div>
                                <label class="block mb-1">رمز عبور</label>
                                <input v-model="form.password" type="password" class="w-full border rounded-lg p-2 text-left" dir="ltr"/>
                            </div>
                            <button type="submit" :disabled="form.processing" class="w-full bg-green-600 text-white py-2 rounded-lg">
                                {{ form.processing ? 'در حال ذخیره...' : 'تایید و ثبت' }}
                            </button>
                        </form>
                    </Modal>
                </div>

                <!-- Empty State -->
                <div v-if="users.length === 0" class="p-12 text-center text-slate-400">
                    کاربری در سیستم یافت نشد.
                </div>
            </div>

        </div>
    </AdminLayout>
</template>
