<template>
  <Navbar/>
   <div class="max-w-6xl mx-auto px-2 md:px-4 py-2 mt-12 md:mt-20">
    <div class="flex items-center border-b justify-between py-4 mb-4 px-2 md:px-0">
        <h6 class="text-xl">Checkout</h6>
        <a href="/shop" class="text-sm text-gray-700 hover:text-gray-400 hover:cursor-pointer hover:underline">Continue Shopping</a>
    </div>
    <div class="grid grid-cols-1  md:grid-cols-12 md:order-first order-last gap-1 md:gap-4">
      <form @submit.prevent="submit" class="md:col-span-7 px-2 md:px-4 md:py-2 py-4">

        <p class="text-base text-gray-500 mb-4">Personal Information</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2 py-1">
         
          <div class="mb-4">
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900">Firstname</label>
            <input type="text" id="firstname" v-model="form.firstname"  class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
            <InputError class="mt-2" :message="form.errors.firstname" />
          </div>

          <div class="mb-4">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Lastname</label>
            <input type="lastname" id="lastname" v-model="form.lastname" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required>
            <InputError class="mt-2" :message="form.errors.lastname" />
          </div>

        </div>

        <p class="text-base text-gray-500 mb-4">Contact Information</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2 py-1">
         
          <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" v-model="form.email" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John@gmail.com" required>
            <InputError class="mt-2" :message="form.errors.email" />
          </div>

          <div class="mb-4">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
            <input type="text" id="phone" v-model="form.phonenumber" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+254 70 000 000" required>
            <InputError class="mt-2" :message="form.errors.phonenumber" />
          </div>

        </div>

        <p class="text-base text-gray-500 mb-4">Location Information</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 md:gap-2 py-1">
         
          <div class="mb-4">
            <label for="county" class="block mb-2 text-sm font-medium text-gray-900">County</label>
            <input type="text" id="county" v-model="form.county" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kiambu" required>
            <InputError class="mt-2" :message="form.errors.county" />
          </div>

          <div class="mb-4">
            <label for="sub" class="block mb-2 text-sm font-medium text-gray-900">Sub County</label>
            <input type="text" id="sub" v-model="form.subcounty" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ruiru" required>
            <InputError class="mt-2" :message="form.errors.subcounty" />
          </div>

          <div class="mb-4">
            <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
            <input type="text" id="ward" v-model="form.ward" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Theta" required>
            <InputError class="mt-2" :message="form.errors.ward" />
          </div>

        </div>

        <button class="w-full bg-green-600 mt-4 hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                Place order
        </button>
      </form>
      <div class="md:col-start-8 md:col-end-12 order-first md:order-last px-2 md:px-4 md:py-2 py-4">
         <div class="border px-4 py-2">

        <h2 class="text-xl text-center mb-4">Order Summary</h2>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Products</h6>
          <p class="text-sm text-gray-400">({{ products }})</p>
        </div>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Price</h6>
          <p class="text-sm text-gray-400">Ksh {{ amount }}</p>
        </div>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Delievery Fee</h6>
          <p class="text-sm text-gray-400">Ksh ({{ delievery_fee }})</p>
        </div>

        <div class="flex items-center justify-between py-2 border-t">
          <h6 class="text-sm">Total</h6>
          <p class="text-sm text-gray-400">Ksh {{ total }}</p>
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

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });

let amount=ref(0)
let products =ref(0)
let delievery_fee =ref(500)
let total =ref(0)
let Orders = ref([])

let Cart = JSON.parse(localStorage.getItem('cart'))

const {orders,total_price,total_products}=Cart

amount.value=total_price
products.value = total_products
total.value= delievery_fee.value + amount.value

const form = useForm({
  firstname:'',
  lastname:'',
  email:'',
  phonenumber:'',
  county:'',
  subcounty:'',
  ward:'',
  order:null,
  amount:''
})


for(let cart in orders){
    const {image,name,price,total_quantity,...orderInfo} =orders[cart]
    Orders.value.push({
      name,
      productID:cart,
      total_quantity,
      image:image,
      total_amount: price * total_quantity,
      ...orderInfo
    })

}


const submit =()=>{
  form.order=Orders.value,
  form.amount = total_price
  form.post('/create/order',{
   
    onFinish:()=>{
     form.reset('county','email','firstname','lastname','phonenumber','subcounty','ward')
    },
    onSuccess:()=>{
        toaster.success("Order made succussfully")
        form.reset('county','email','firstname','lastname','phonenumber','subcounty','ward')
        localStorage.removeItem('cart')
    },
    onError:(error)=>{
      
      const values = Object.values(error)

      values.forEach(value=>{
        toaster.error(value)
      })

    },
    onProgress:()=>{
      console.log("progress...")
    }
  })
}


</script>




<!--  checkbox for payment

<p class="text-base text-gray-500 mb-2">Payment Information</p>

<div class="grid grid-cols-2 gap-1 md:gap-2 py-2">
 
  <div class="mb-4">  
    <div class="flex items-center">
        <input id="green-radio" type="radio" v-model="form.payment" value="mpesa" name="colored-radio" class="w-4 h-4 text-green-600  border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 ">
        <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 ">Mpesa</label>
    </div>
  </div>

  <div class="mb-4">
    <div class="flex items-center">
        <input checked id="purple-radio" type="radio" v-model="form.payment" value="paypal" name="colored-radio" class="w-4 h-4 text-purple-600  border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2">
        <label for="purple-radio" class="ml-2 text-sm font-medium text-gray-900 ">Paypal</label>
    </div>
  </div>

  <div class="mb-4">
    <div class="flex items-center">
        <input id="orange-radio" type="radio" v-model="form.payment" value="mastercard" name="colored-radio" class="w-4 h-4 text-orange-500  border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2">
        <label for="orange-radio" class="ml-2 text-sm font-medium text-gray-900 ">Master card</label>
    </div>
  </div>

  <div class="mb-4">
    <div class="flex items-center">
        <input id="teal-radio" type="radio" v-model="form.payment" value="visacard" name="colored-radio" class="w-4 h-4 text-teal-600  border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2">
        <label for="teal-radio" class="ml-2 text-sm font-medium text-gray-900 ">Visa card</label>
    </div>
  </div>

</div>

<InputError class="my-2" :message="form.errors.payment" /> -->