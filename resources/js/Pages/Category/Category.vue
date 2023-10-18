<template>
  <Navbar/>
  <MiniBanner :category="Category.catergory_name" :img="Category.image"/>
  
    <div class="min-h-[calc(100vh-100px)]">
       <div class="">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-4 py-4">
         <div class="p-2" v-for="product in Products" :key="product.id">
            <img :src="product.images[0].image" alt="" class="h-56 w-full object-cover">

            <div class="flex items-center justify-between mt-2">
                <a :href="'/product/'+ product.id" class="text-base md:text-xl text-gray-800 hover:text-gray-400 hover:cursor-pointer hover:underline">{{ product.name }}</a>
                <p class="text-sm">{{product.price}}</p>
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

                <button class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base mt-4">
                      Add to Cart
                </button>
            </div>
    </div>
       </div>
    </div>

  <Footer/>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue'
import MiniBanner from "@/CustomComponents/MiniBanner.vue";
import Footer from '@/CustomComponents/Footer.vue';
import { ref } from 'vue';

import {split,backgroundColor,AddToCart} from '@/utils.js'

let category = ref({});

const  {Products,Category}  = defineProps(['Products','Category']);

console.log(Products)

</script>
