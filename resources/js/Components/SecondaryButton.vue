<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="flex items-center justify-center px-4 py-2  bg-green-600  font-semibold text-base tracking-widest hover:bg-green-500 text-white   focus:outline-none transition ease-in-out duration-150">
        <slot />
    </button>
</template>
