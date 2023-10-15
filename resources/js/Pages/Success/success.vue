<template>
    <Navbar/>
    <div class="h-[calc(100vh-100px)] w-full  mt-16 md:mt-20 px-2 flex items-center justify-center">
        <div class="flex items-center justify-center flex-col gap-4 md:gap-6 bg-green-300/50 p-4 h-96 md:max-w-md">
            <h1 class="text-2xl md:text-4xl text-gray-700">Successful Payment</h1>
            <p class="text-sm text-gray-500">Thank you {{Customer.name}} for choosing Laravue! We appreciate your order and value your trust in our products.
                <br/> Your support fuels our passion, and we're excited to serve you again.
                 Please check your email ({{Customer.email}}) for the tracking number.
            </p>
            <a href="/" class="px-4 py-2 text-center text-base bg-green-600/80 hover:bg-green-600 text-white rounded-sm w-28">Done</a>
        </div>
    </div>
</template>

<script setup>
   import Navbar from '@/Components/Navbar.vue'
   import { onMounted, ref } from 'vue'

   const {customer} = defineProps(['customer'])

   let Customer = ref({})
    
   onMounted(()=>{
    localStorage.removeItem('cart');
    Customer.value = customer
   });

</script>

<style>

</style>