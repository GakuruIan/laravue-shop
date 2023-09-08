<template>
  <Navbar/>
  <!-- Dialog modal-->
  <DialogModal :show="openModal"  :closeable="true">
      <template #title>
        <h2>Order details</h2>
      </template>
      <template #content>

        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Size
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th >
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order,index in orderInfo.order_details" :key="index" class="bg-white border-b odd:bg-white even:bg-slate-50">
                       <td class="px-6 py-4 font-medium text-gray-900">
                               <h4 class="text-base"> {{ orderInfo.name }} </h4> 
                       </td>
                        <td  class="px-6 py-4"> 
                             <span :style="{backgroundColor:order.color}" class="flex items-center justify-center p-2 rounded-full w-4 h-4 hover:cursor-pointer"></span> 
                        </td>

                        <td class="px-6 py-4">
                                <span class="text-sm border border-gray-300 rounded-sm p-2 text-center">{{ order.size }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-base text-gray-500">{{ order.quantity }}</p>
                        </td>
                        <td class="px-6 py-4">
                            {{ orderInfo.price }} 
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button @click="RemoveSpecificOrder(orderInfo.id,index)" class="px-4 py-2 border border-gray-300 text-center group hover:cursor-pointer text-sm text-gray-500 hover:text-gray-400">
                                        Remove 
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
        </table>
      </template>

      <template #footer>
            <div class="flex justify-end">
                <button @click="CloseModal()" class="px-4 py-2 text-base text-white bg-red-600 hover:bg-red-500 rounded-sm">Close</button>
            </div>
        </template>
  </DialogModal>

  <!-- cart view -->
  <div class="max-w-5xl mx-auto py-2 mt-12 md:mt-20">
      <div class="flex items-center border-b justify-between py-4 mb-4 px-2 md:px-0">
        <h6 class="text-xl">Cart</h6>
        <h6 class="text-sm text-gray-700 hover:text-gray-400 hover:cursor-pointer hover:underline">Continue Shopping</h6>
      </div>

      <!-- cart list -->
      <div class="py-2 px-2 md:px-0">
       
         <!-- table view for tablets and bigger devices -->
        <div class="relative overflow-x-auto hidden md:block">
            
            <table v-if="Cart.length > 0" class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Size
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th >
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in Cart" :key="product.id" class="bg-white border-b odd:bg-white even:bg-slate-50">
                        <td  class="px-6 py-4 flex gap-2 items-center font-medium text-gray-900">
                            <img :src="product.image" alt="" srcset="" class="h-24 w-20">
                            <div class=""> 
                                <p class="text-base text-gray-500 mb-4 hover:text-gray-400 hover:cursor-pointer">{{ product.name }}</p>
                                <div class="flex gap-2">
                                    <p class="text-sm text-gray-400">Color:</p>
                                    <div class="flex items-center gap-1">
                                        <span v-for="order,index in product.order_details" :key="index" :style="backgroundColor(order.color)" class="flex items-center justify-center p-2 rounded-full bg-indigo-300 hover:cursor-pointer"></span> 
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 ">
                            <div class="flex gap-2">
                                <span v-for="order,index in product.order_details" :key="index" class="text-sm border border-gray-300 rounded-sm p-2 text-center">{{ order.size }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class=" flex gap-2 items-center">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base">
                                    -
                                </button>
                                <input type="number" class=" border border-gray-400 py-2 px-4 w-20" :value="product.total_quantity">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base ">
                                        +
                                </button>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ product.price }} 
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button @click="toggleModal(product.id)" class="px-4 py-2 bg-indigo-600 text-center group hover:cursor-pointer text-sm text-gray-500 hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>

                                <button @click="RemoveProductInCart(product.id)" class="px-4 py-2 border border-gray-300 text-center group hover:cursor-pointer text-sm text-gray-500 hover:text-gray-400">
                                        Remove 
                                </button>
                            </div>
                        </td>
                    </tr>
                 
                  
                </tbody>
            </table>
            <div v-else class="min-h-96 w-full flex flex-col items-center justify-center md:gap-6 gap-2">
                <img :src="empty" class="h-36 w-36 object-fit"/>
                <h1 class="text-xl md:text-2xl text-gray-400">Cart is Empty</h1>
            </div>

            <div v-if="Cart.length > 0" class="flex flex-col  gap-4 items-end mt-4">
                    <h6 class="text-base text-gray-400">Total Price Ksh: {{ total }}</h6>
                    <div class="flex gap-2">
                        <button  @click="ClearCart()" class="bg-red-600  hover:text-white text-white hover:bg-red-400 px-4 py-2  text-base ">
                            Clear Cart
                        </button>

                        <button class="bg-green-600  hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                            Check out
                        </button>
                   </div>
             </div>
        </div>
        
        <!-- mobile view  -->
        <div class="px-2 md:px-0 md:hidden">
          <div v-if="Cart.length > 0" class="">
              <!-- single product -->
                  <div v-for="product in Cart" :key="product.id" class="py-4 border-b mb-2">
                      <div class="grid grid-cols-2 gap-2">
                          <img :src="product.image" alt="" srcset="" class="h-full w-full object-cover">

                          <div class="flex flex-col gap-1">
                              <h1 class="text-xl mb-4">{{ product.name }}</h1>

                              <!-- size -->
                              <div class="mb-2 flex gap-1 items-center">
                                  <h6 class="text-base mb-1">Size: </h6>
                                  <div class="flex gap-2">
                                      <span v-for="order,index in product.order_details" :key="index"  class="text-sm border border-gray-300 rounded-sm p-2 text-center">{{ order.size }}</span>
                                  </div>
                              </div>

                              <!-- color -->
                              <div class="mb-2 flex  gap-1">
                                  <h6 class="text-base ">Color: </h6>
                                      <div class="flex items-center gap-1">
                                          <span v-for="order,index in product.order_details" :key="index" :style="backgroundColor(order.color)" class="flex items-center justify-center p-2 rounded-full hover:cursor-pointer"></span>
                                      </div>
                              </div>

                              <div class="mb-2 flex  gap-1">
                                  <h6 class="text-base ">Price: </h6>
                                  <p class="text-base text-gray-500">KSH {{ product.price }}</p>
                              </div>
                            
                              <div class="mb-2">
                                  <h6 class="text-base ">Quantity: </h6>
                                  <div class=" flex gap-2 items-center">
                                      <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base">
                                          -
                                      </button>
                                      <input type="number" class=" border border-gray-400 py-2 px-4 w-20" :value="product.total_quantity">
                                      <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base ">
                                              +
                                      </button>
                                  </div>
                              </div>
                              <div class="">
                                  <button  @click="RemoveProductInCart(product.id)" class="border hover:bg-red-600 hover:text-white group flex items-center gap-2 px-4 py-2  text-base ">
                                      remove
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-red-400 group-hover:stroke-white">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              <!-- single product -->
                <div class="flex gap-2 justify-end mt-4">
                        <button @click="ClearCart()" class="bg-red-600  hover:text-white text-white hover:bg-red-400 px-4 py-2  text-base ">
                            Clear Cart
                        </button>

                        <button class="bg-green-600  hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                            Check out
                        </button>
                </div>
            </div>
            <!-- empty Cart -->
            <div v-else class="min-h-96 w-full flex flex-col items-center justify-center md:gap-6 gap-2">
                <img :src="empty" class="h-36 w-36 object-fit"/>
                <h1 class="text-xl md:text-2xl text-gray-400">Cart is Empty</h1>
            </div>
            
        </div>
      </div>
  </div>
</template>

<script setup>
import empty from '@/assets/empty-box.png';
import Navbar from '@/Components/Navbar.vue';
import {backgroundColor,RemoveProduct,RemoveOrderDetails} from '@/utils'
import { ref } from 'vue';
import  { createToaster } from "@meforma/vue-toaster";
import DialogModal from '@/Components/DialogModal.vue'

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });

let Cart = ref([])
let total = ref(0)
let orderInfo = ref({})
let openModal = ref(false)

let cartItems = localStorage.getItem('cart')

let productsInCart = cartItems ? JSON.parse(cartItems) : {orders:{},total_price:0,total_products:0}

let {orders,total_price} = productsInCart

// adding orders to Cart array
for(let item in orders){
    Cart.value.push({
      id:item,
      ...orders[item]
    })
}

total.value =total_price

// clearing cart
const ClearCart=()=>{
   localStorage.removeItem('cart')
}

// removing a specific product
const RemoveProductInCart=(id)=>{
  let deleted = RemoveProduct(id)

  if(deleted){
   toaster.success("product removed successfully")
  }
  else{
   toaster.error("Sorry could not remove product, Try Again")
  }
}

// Removing a products order details
const RemoveSpecificOrder=(productId,index)=>{
    RemoveOrderDetails(productId,index)
}


// open modal for order details
const toggleModal = (id)=>{
  openModal.value = !openModal.value

  if(openModal.value){
    orderInfo.value = orders[id]
    orderInfo.value['id'] = id
  }
}

// close modal
const CloseModal=()=>{
    openModal.value = false
}


</script>

<style>

</style>