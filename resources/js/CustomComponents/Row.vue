<template>
  <div class="my-10">
    <div class="">

        <div class="mb-4 flex items-center justify-between">
          <h1 class="text-xl md:text-2xl">{{ title }}</h1>
          <a href="/shop" class="text-sm md:text-base hover:cursor-pointer text-gray-800 hover:underline hover:text-gray-400 flex items-center gap-2">View all products
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
          </a>
        </div>
         
        <div>

          <!-- loader -->
          <div  v-if="Loading">
             <MiniLoader/>
          </div>

            <div v-else class="grid grid-cols-2 md:grid-cols-4 gap-3 py-2" >
  
              <div class="py-2 w-full " v-for="product in data" :key="product.id">
                    <img :src="product.images[0].image" alt=""  class="h-44 rounded-sm md:h-44 w-full md:w-full object-fit"/>
                    <div class="flex justify-between items-center mt-1">
                      <a href="/" class="text-base hover:text-gray-700 hover:underline">{{product.name}}</a>
                      <p class="text-base text-gray-400">Ksh {{product.price}}</p>
                    </div>
              </div>
  
            </div>


        </div>

    </div> 
  </div>
</template>

<script setup>
import { ref } from 'vue';
import MiniLoader from '@/CustomComponents/MiniLoader.vue'


const props = defineProps({
  data:Object,
  title:String,
  Loading:Boolean
})


</script>
