
<template>
  <Navbar/>
  <div class="relative mt-16 md:mt-20 max-w-6xl mx-auto md:px-4 px-2">
    <div class="flex items-center justify-between py-4 md:w-full border-b w-full">
      <h1 class="text-xl text-gray-600">Orders</h1>
      <form @submit.prevent="submit" class="flex gap-4 items-center justify-end">
          <div class="">
                <TextInput
                    id="search"
                    v-model="form.tracking_id"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    autofocus
                    placeholder="Enter the tracking number"
                />
                <InputError class="mt-2" :message="form.errors.tracking_id" />
            </div>
            <div class="">
                <SecondaryButton type="submit" class="w-full py-2.5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
               </SecondaryButton>
            </div>
      </form>
    </div>
   
    <div v-if="loading" class="min-h-96 bg-indigo-400">
       <Loader/>
    </div>

    <div v-else class="mt-2">

        <div class="border-b border-gray-200 py-2" v-for="order in Orders" :key="order.id">
              <div class="grid grid-cols-1 gap-2 md:gap-4 md:grid-cols-4">
                <div class="flex gap-4">
                  <img :src="order.product.images[0].image" alt="" srcset="" class="h-18 w-16 object-cover rounded-md">
                  <div class="flex flex-col gap-1">
                      <h1 class="text-base text-gray-400">{{order.product.name}}</h1>
                      <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-400">Color</span>
                        <span   :style="backgroundColor(order.color)" class="flex items-center h-3 w-3 justify-center p-2 rounded-full hover:cursor-pointer"></span>
                      </div>
                  </div>
                </div>
                <div class="flex gap-x-2 md:gap-y-2 md:flex-col">
                  <h6 class="text-gray-400 text-sm"> Price </h6>
                  <h6 class="text-sm text-gray-400"> x {{order.product.price}} each {{order.quantity}}</h6>
                </div>
                <div class="flex gap-x-2 gap-y-2 md:flex-col">
                  <h6 class="text-gray-400 text-sm"> Size </h6>
                  <h6 class="text-sm text-gray-400"> {{order.size}}</h6>
                </div>
                <div class="flex gap-x-2 gap-y-2 md:flex-col">
                  <h6 class="text-gray-400 text-sm"> Payment status </h6>
                  <h6 class="text-sm text-gray-400"> {{order.order.payment_status}}</h6>
                </div>
              </div>
        </div>

        <div v-if="Orders.length > 0" class="absolute right-0 mt-2 mr-4">
          <h6 class="text-gray-400 text-sm ">Delivery Status: {{Orders[0].order.delivery_status}}</h6>
          <h6 class="block text-gray-400 text-sm my-2">Shipping Fee: {{ Orders[0].order.shipping_fee }} </h6>
          <h6 class="text-gray-400 text-sm ">Sub total: {{Orders[0].order.amount}}</h6>
        </div>

    </div>
</div>
</template>



<script setup>
import Navbar from '@/Components/Navbar.vue'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import Loader from '@/CustomComponents/Loader.vue'

import {useForm } from '@inertiajs/vue3'
import { ref } from 'vue';
import  { createToaster } from "@meforma/vue-toaster";
import {backgroundColor} from '../../utils.js'

import {baseURL} from '../../axios.js';

let Orders = ref([])
let loading = ref(false)


const form = useForm({
  tracking_id:''
})

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });



const submit =()=>{
    loading.value = true
   baseURL.post('/order/search',{
    tracking_id:form.tracking_id
   })
   .then((response)=>{
     if(response.status === 200 && response.statusText === 'OK'){
       Orders.value = response.data
       form.tracking_id=''
       loading.value= false
     }
   }).catch((error)=>{
      loading.value= false
      toaster.error(error.message)
   })

}
</script>
