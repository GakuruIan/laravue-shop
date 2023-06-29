<template>
  <div class="my-10">
    <div class="px-2 md:px-4">
        <div class="mb-4 flex items-center justify-between">
          <h1 class="text-xl md:text-2xl">{{ title }}</h1>
          <a href="" class="text-base md:text-base hover:cursor-pointer text-gray-800 hover:underline hover:text-gray-400 flex items-center gap-2">View all products
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
          </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 py-2">
           <div class="py-2 w-full " v-for="(image,index) in Images" :key="index">
              <img :src="image" alt=""  class="h-56 md:h-72 w-full md:w-full object-cover"/>
              <div class="flex justify-between items-center">
                <a href="/" class="text-base hover:text-gray-700 hover:underline">Product name</a>
                 <p class="text-base text-gray-400">12,000</p>
              </div>
           </div>
        </div>
    </div> 
  </div>
</template>

<script>

import pic1 from '../assets/pic1.jpg';
import pic2  from '../assets/pic2.jpg';
import pic3 from '../assets/pic3.jpg';
import pic4 from '../assets/pic4.jpg';

export default {
  props:{
    title:{
        type:String,
        required:true
    }
  },
  data(){
    return{
        Images:[
        pic1,
        pic2,
        pic3,
        pic4
        ]
    }
  }
}
</script>

<style>

</style>