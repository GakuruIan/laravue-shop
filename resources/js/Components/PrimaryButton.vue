<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="flex items-center justify-center px-4 py-2  border border-[#222]  font-semibold text-base  tracking-widest hover:bg-[#222] hover:text-white  active:bg-[#212121] focus:outline-none transition ease-in-out duration-150">
        <slot />
    </button>
</template>
