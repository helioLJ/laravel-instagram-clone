<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: File,
        required: false,
    },
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        :name="id"
        type="file"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        @change="$emit('update:modelValue', $event.target.files[0])"
        ref="input"
    />
</template>
