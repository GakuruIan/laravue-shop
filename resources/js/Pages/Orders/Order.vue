
<template>
  <Navbar/>
  <div class="mt-16 md:mt-20 max-w-6xl mx-auto md:px-4 px-2">
    <div class="py-4 md:w-48 w-full">
      <TextInput
            id="search"
            v-model="search"
            type="search"
            class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
            required
            placeholder="Enter tracking number or phone number"
          />
    </div>
    <div class="mt-2">

      <!-- <div class="border-b border-gray-200 py-2" v-for="order in Orders" :key="order.id">
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
      </div> -->

    </div>
</div>
</template>



<script setup>
import Navbar from '@/Components/Navbar.vue'
import { ref } from 'vue';


</script>
