<template>
  <div class="my-10 py-4">
        <div class=" flex max-w-5xl mx-auto overflow-x-scroll w-full gap-4 px-2 md:px-0">
            <div class="relative w-full h-56 py-2 hover:cursor-pointer" v-for="(image,index) in Images" :key="index" >
              <img :src="image" alt=""  class="h-full md:w-full object-cover"/>
              <div class="absolute text-center inset-y-24 inset-x-10 px-2 bg-white  py-1">
                <h6 class="text-base">Catergory</h6>
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