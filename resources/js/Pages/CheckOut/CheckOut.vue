<template>
   <div class="max-w-6xl mx-auto px-2 md:px-4 py-2 mt-12 md:mt-20">
    <div class="flex items-center border-b justify-between py-4 mb-4 px-2 md:px-0">
        <h6 class="text-xl">Checkout</h6>
        <h6 class="text-sm text-gray-700 hover:text-gray-400 hover:cursor-pointer hover:underline">Continue Shopping</h6>
    </div>
    <div class="grid grid-cols-1  md:grid-cols-12 md:order-first order-last gap-1 md:gap-4">
      <form action="" class="md:col-span-7 px-2 md:px-4 md:py-2 py-4">

        <p class="text-base text-gray-500 mb-2">Personal Information</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2 ">
         
          <div class="mb-4">
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900">Firstname</label>
            <input type="text" id="firstname" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
          </div>

          <div class="mb-4">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Lastname</label>
            <input type="lastname" id="lastname" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required>
          </div>

        </div>

        <p class="text-base text-gray-500 mb-2">Contact Information</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2 ">
         
          <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John@gmail.com" required>
          </div>

          <div class="mb-4">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
            <input type="text" id="phone" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+254 70 000 000" required>
          </div>

        </div>

        <p class="text-base text-gray-500 mb-2">Location Information</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 md:gap-2 ">
         
          <div class="mb-4">
            <label for="county" class="block mb-2 text-sm font-medium text-gray-900">County</label>
            <input type="text" id="county" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kiambu" required>
          </div>

          <div class="mb-4">
            <label for="sub" class="block mb-2 text-sm font-medium text-gray-900">Sub County</label>
            <input type="text" id="sub" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ruiru" required>
          </div>

          <div class="mb-4">
            <label for="ward" class="block mb-2 text-sm font-medium text-gray-900">Ward</label>
            <input type="text" id="ward" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Theta" required>
          </div>

        </div>

        <p class="text-base text-gray-500 mb-2">Payment Information</p>

        <div class="grid grid-cols-2 gap-1 md:gap-2 py-2">
         
          <div class="mb-4">  
            <div class="flex items-center">
                <input id="green-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-green-600  border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 ">
                <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 ">Mpesa</label>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex items-center">
                <input checked id="purple-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-purple-600  border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2">
                <label for="purple-radio" class="ml-2 text-sm font-medium text-gray-900 ">Paypal</label>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex items-center">
                <input id="orange-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-orange-500  border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2">
                <label for="orange-radio" class="ml-2 text-sm font-medium text-gray-900 ">Master card</label>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex items-center">
                <input id="teal-radio" type="radio" value="" name="colored-radio" class="w-4 h-4 text-teal-600  border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2">
                <label for="teal-radio" class="ml-2 text-sm font-medium text-gray-900 ">Visa card</label>
            </div>
          </div>

        </div>
        <button class="w-full bg-green-600  hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                Pay
        </button>
      </form>
      <div class="md:col-start-8 md:col-end-12 order-first md:order-last px-2 md:px-4 md:py-2 py-4">
         <div class="border px-4 py-2">

        <h2 class="text-xl text-center mb-4">Order Summary</h2>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Products</h6>
          <p class="text-sm text-gray-400">(5)</p>
        </div>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Price</h6>
          <p class="text-sm text-gray-400">Ksh 14,000</p>
        </div>

        <div class="flex items-center justify-between py-2">
          <h6 class="text-sm">Delievery Fee</h6>
          <p class="text-sm text-gray-400">Ksh 400</p>
        </div>

        <div class="flex items-center justify-between py-2 border-t">
          <h6 class="text-sm">Total</h6>
          <p class="text-sm text-gray-400">Ksh 14,400</p>
        </div>

      </div>

      </div>
   </div>
   </div>
</template>

<script>
import Checkbox from '../../Components/Checkbox.vue'
export default {
  components:{
    Checkbox
  }
}
</script>

<style>

</style>