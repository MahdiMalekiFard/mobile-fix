<script setup>
import {useForm, Link} from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue'; // فرض بر وجود Layout

const props = defineProps({user: Object});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '' // خالی بماند مگر اینکه بخواهیم عوض کنیم
});

const submit = () => {
    // چون در لاراول متد PUT گاهی با فایل‌ها مشکل دارد، از POST و _method استفاده می‌کنیم (یا مستقیماً put)
    form.put(route('admin.users.update', props.user.id));
};
</script>

<template>
    <AdminLayout>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow mt-10">
            <h2 class="text-xl font-bold mb-6">ویرایش کاربر: {{ user.name }}</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- فیلدها مشابه مودال اما با مقادیر اولیه از props.user -->
                <div>
                    <label>نام</label>
                    <input v-model="form.name" class="w-full border p-2 rounded"/>
                </div>
                <div>
                    <label>ایمیل</label>
                    <input v-model="form.email" class="w-full border p-2 rounded text-left" dir="ltr"/>
                </div>
                <div>
                    <label>رمز عبور جدید (اختیاری)</label>
                    <input v-model="form.password" type="password" class="w-full border p-2 rounded text-left" dir="ltr"/>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">بروزرسانی</button>
                    <Link :href="route('admin.users.index')" class="bg-gray-200 px-6 py-2 rounded">انصراف</Link>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
