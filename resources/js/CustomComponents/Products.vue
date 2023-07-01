<template>
  <div class="max-w-5xl mx-auto px-2 md:px-0 ">
    <h6 class="text-lg mb-2">Products</h6>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-2 md:gap-4 py-4">
         <div class="p-2" v-for="(image,index) in Images" :key="index">
            <img :src="image" alt="" class="h-56 w-full object-cover">

            <div class="flex items-center justify-between mt-2">
                <h6 class="text-base text-gray-800 hover:text-gray-400 hover:cursor-pointer hover:underline">Product name</h6>
                <p class="text-sm">KSH 1200</p>
            </div>

           

            <!-- size -->
            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">Size :</p>
                <div class="flex items-center gap-3">
                    <span class="flex items-center justify-center py-1 px-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">sm</span>
                    <span class="flex items-center justify-center py-1 px-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">md</span>
                    <span class="flex items-center justify-center py-1 px-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">lg</span>
                    <span class="flex items-center justify-center py-1 px-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">xl</span>
                </div>
            </div>

            <!-- color -->

            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">Color :</p>
                <div class="flex items-center gap-3">
                    <span class="flex items-center justify-center p-2 rounded-full bg-indigo-300 hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-2 rounded-full bg-gray-900 hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-2 rounded-full bg-[#ff0] hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-2 rounded-full bg-cyan-700 hover:cursor-pointer"></span>
                </div>
            </div>

            <!-- stock -->
            <div class="flex items-center gap-3 my-3">
                <p class="text-sm">In Stock:</p>
                 <p class="text-sm text-gray-400">7 remaining</p>
            </div>

            <!-- buttons -->

                <button class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base mt-4">
                      Add to Cart
                </button>
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

<script>
import jacket from '../assets/jacket.jpg';
import jacket2 from '../assets/jacket2.jpg';
import tshirt from '../assets/tshirt.jpg';
import tshirt2 from '../assets/tshirt2.jpg';
export default {
  data(){
     return{
        Images:[
            jacket,
            jacket2,
            tshirt,
            tshirt2,
            tshirt,
            tshirt2
        ]
     }
  }
}
</script>

<style>

</style>