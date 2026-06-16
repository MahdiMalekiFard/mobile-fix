<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-bold">{{ title }}</h3>
                <button @click="$emit('close')" class="text-gray-500 hover:text-red-500">✕</button>
            </div>
            <div class="p-6">
                <slot/>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    show: Boolean,
    title: String
});
defineEmits(['close']);
</script>
