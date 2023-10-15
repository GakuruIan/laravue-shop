<template>
  <Navbar/>
   <div class="max-w-6xl mx-auto px-2 md:px-4 py-2 mt-12 md:mt-20">
    <div class="flex items-center border-b justify-between py-4 mb-4 px-2 md:px-0">
        <h6 class="text-xl">Checkout</h6>
        <a href="/shop" class="text-sm text-gray-700 hover:text-gray-400 hover:cursor-pointer hover:underline">Continue Shopping</a>
    </div>
    <div class="grid grid-cols-1  md:grid-cols-12 md:order-first order-last gap-1 md:gap-4">
      <div class="md:col-span-7 px-2 md:px-4 md:py-2 py-4">

        <div class="border-b border-gray-200 py-2" v-for="order in Orders" :key="order.id">
          <div class="flex justify-between items-center">
            <div class="flex gap-4">
               <img :src="order.image" alt="" srcset="" class="h-18 w-16 object-cover rounded-md">
               <div class="flex flex-col gap-1">
                  <h1 class="text-base text-gray-400">{{order.name}}</h1>
                  <div class="flex items-center gap-2">
                    <span v-for="item,index in order.order_details" :key="index" :style="backgroundColor(item.color)" class="flex items-center h-4 w-4 justify-center p-2 rounded-full hover:cursor-pointer"></span>
                  </div>
                  <h6 class="text-sm text-gray-400"> x {{order.total_quantity}} each {{order.price}}</h6>
               </div>
            </div>
            <h6 class="text-base text-gray-400">Kes {{order.total_amount}}</h6>
          </div>
        </div>

          <form @submit.prevent="submit">
            <button  class="w-full bg-green-600 mt-4 hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
              Place order
            </button>
          </form>
      </div>

      <div class="md:col-start-8 md:col-end-12 order-first md:order-last px-2 md:px-4 md:py-2 py-4">
         <div class="border px-4 py-2">

        <h2 class="text-xl text-center mb-4">Order Summary</h2>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Products</h6>
          <p class="text-sm text-gray-400">({{ products }})</p>
        </div>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Price</h6>
          <p class="text-sm text-gray-400">Kes {{ amount }}</p>
        </div>

        <div class="flex items-center justify-between py-2 border-t">
          <h6 class="text-sm">Total</h6>
          <p class="text-sm text-gray-400">Kes {{ amount }}</p>
        </div>

      </div>

      </div>
   </div>
   </div>
</template>

<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import Navbar from '@/Components/Navbar.vue'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue'
import  { createToaster } from "@meforma/vue-toaster";
import {backgroundColor} from '@/utils'

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });

let amount=ref(0)
let products =ref(0)
let delievery_fee =ref(500)
let Orders = ref([])

let Cart = JSON.parse(localStorage.getItem('cart')) || {orders:{},total_price:0,total_products:0}

const {orders,total_price,total_products}=Cart



amount.value=total_price
products.value = total_products

const form = useForm({
  order:null,
  amount:0
})


for(let cart in orders){
    const {image,name,price,total_quantity,...orderInfo} =orders[cart]
    Orders.value.push({
      name,
      productID:cart,
      price,
      total_quantity,
      image:image,
      total_amount: price * total_quantity,
      ...orderInfo
    })

}


const submit =()=>{
  form.transform((data)=>({
    order:Orders.value,
    amount:total_price
  })).post('/create/order')
}


</script>
