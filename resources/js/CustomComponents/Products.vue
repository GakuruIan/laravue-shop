<template>
  <div class="max-w-6xl mx-auto px-2 md:px-2 ">
    <h1 class="text-lg mb-2">Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-4 py-4">
         <div class="p-0" v-for="product in Products" :key="product.id">
            <img :src="product.images[0].image" alt="" class="h-56 w-full object-cover">

            <div class="flex items-center justify-between mt-2">
                <a :href="'/product/'+ product.name" class="text-base md:text-base text-gray-800 hover:text-gray-400 hover:cursor-pointer hover:underline">{{ product.name }}</a>
                <p class="text-sm">Ksh {{product.price}}</p>
            </div>

           

            <!-- size -->
            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">Size :</p>
                <div class="flex items-center gap-3">
                    <span v-for="size,index in split(product.size)" :key="index" class="flex items-center justify-center py-1 px-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">{{ size }}</span>
                </div>
            </div>

            <!-- color -->

            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">Color :</p>
                <div class="flex items-center gap-3" >
                    <span v-for="color,index in split(product.colors)" :key="index" class="flex items-center justify-center p-2 rounded-full hover:cursor-pointer" :style="backgroundColor(color)" ></span>
                </div>
            </div>

            <!-- stock -->
            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">In Stock:</p>
                 <p class="text-sm text-gray-400">{{ product.stock }} remaining</p>
            </div>

            <!-- buttons -->

                <a :href="`/product/${product.name}`" class="flex  items-center justify-center gap-4 border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base mt-4">
                     View 
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>

                </a>
            </div>
    </div>
         <div class="flex justify-end w-full mt-4 py-2">
                
<nav aria-label="Page navigation example">
  <ul class="inline-flex items-center -space-x-px">
    <li>
      <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border rounded-l-lg">
        <span class="sr-only">Previous</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>

    <li>
      <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
    </li>
    <li>
      <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
    </li>
    <li>
      <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">3</a>
    </li>
    <li>
      <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
    </li>
    <li>
      <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
    </li>
    
    <li>
      <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
        <span class="sr-only">Next</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>
  </ul>
</nav>

         </div>
    </div>
</template>

<script setup>
import{ref} from 'vue'

import { defineProps } from 'vue';
import {split,backgroundColor} from '@/utils.js'

let Products = ref([])


const  {products}  = defineProps(['products']);

for(let product in products){
  Products.value.push({
    id:product,
    ...products[product]
  })
}

</script>

<style>

</style>