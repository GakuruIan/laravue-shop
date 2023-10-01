<template>
    <Navbar/>
    <div class="h-[calc(100vh-100px)] w-full  mt-16 md:mt-20 px-2 flex items-center justify-center">
        <div class="flex items-center justify-center flex-col gap-4 md:gap-6 bg-green-300/50 p-4 h-96 md:max-w-md">
            <h1 class="text-2xl md:text-4xl text-gray-700">Successful Payment</h1>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet libero, nesciunt expedita nulla optio est? Delectus minus aliquid atque velit.</p>
            <button class="px-4 py-2 text-base bg-green-600/80 hover:bg-green-600 text-white rounded-sm w-28">Done</button>
        </div>
    </div>
</template>

<script setup>
   import Navbar from '@/Components/Navbar.vue'

</script>

<style>

</style>