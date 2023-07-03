<template>
  <div class="max-w-5xl mx-auto py-2 mt-12 md:mt-20">
      <div class="flex items-center border-b justify-between py-4 mb-4 px-2 md:px-0">
        <h6 class="text-xl">Cart</h6>
        <h6 class="text-sm text-gray-700 hover:text-gray-400 hover:cursor-pointer hover:underline">Continue Shopping</h6>
      </div>

      <!-- cart list -->
      <div class="py-2 px-2 md:px-0">
       
         <!-- table view for tablets and bigger devices -->
        <div class="relative overflow-x-auto hidden md:block">
            <table class="w-full text-sm text-left text-gray-500 ">
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
                    <tr class="bg-white border-b odd:bg-white even:bg-slate-50">
                        <td class="px-6 py-4 flex gap-2 items-center font-medium text-gray-900">
                            <img :src="jacket" alt="" srcset="" class="h-24 w-20">
                            <div class=""> 
                                <p class="text-base text-gray-500 mb-4 hover:text-gray-400 hover:cursor-pointer">product name</p>
                                <div class="flex gap-2">
                                    <p class="text-sm text-gray-400">Color:</p>
                                    <div class="flex items-center gap-1">
                                        <span class="flex items-center justify-center p-2 rounded-full bg-indigo-300 hover:cursor-pointer"></span>
                                        <span class="flex items-center justify-center p-2 rounded-full bg-gray-900 hover:cursor-pointer"></span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 ">
                            <div class="flex gap-2">
                                <span class="text-sm">md</span>
                                <span class="text-sm">md</span>
                                <span class="text-sm">md</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class=" flex gap-2 items-center">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base">
                                    -
                                </button>
                                <input type="number" class=" border border-gray-400 py-2 px-4 w-20">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base ">
                                        +
                                </button>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                           <h6 class="text-sm text-gray-500 underline hover:cursor-pointer hover:text-gray-400">
                             Remove 
                           </h6>
                        </td>
                    </tr>
                 
                  
                </tbody>
            </table>
            <div class="flex gap-2 justify-end mt-4">
                  <button class="bg-red-600  hover:text-white text-white hover:bg-red-400 px-4 py-2  text-base ">
                      Clear Cart
                  </button>

                  <button class="bg-green-600  hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                       Check out
                    </button>
             </div>
        </div>
        
        <!-- mobile view  -->
        <div class="px-2 md:px-0 md:hidden">
            <!-- single product -->
            <div class="py-4 border-b mb-2">
                <div class="grid grid-cols-2 gap-2">
                    <img :src="jacket" alt="" srcset="" class="h-full w-full object-cover">

                    <div class="flex flex-col gap-1">
                        <h1 class="text-xl mb-4">Product name</h1>

                        <!-- size -->
                        <div class="mb-2 flex gap-1 items-center">
                            <h6 class="text-base mb-1">Size: </h6>
                            <div class="flex gap-2">
                                <span class="text-sm text-gray-400">md</span>
                                <span class="text-sm text-gray-400">md</span>
                                <span class="text-sm text-gray-400">md</span>
                            </div>
                        </div>

                        <!-- color -->
                        <div class="mb-2 flex  gap-1">
                            <h6 class="text-base ">Color: </h6>
                                <div class="flex items-center gap-1">
                                    <span class="flex items-center justify-center p-2 rounded-full bg-indigo-300 hover:cursor-pointer"></span>
                                    <span class="flex items-center justify-center p-2 rounded-full bg-gray-900 hover:cursor-pointer"></span>
                                </div>
                        </div>

                        <div class="mb-2 flex  gap-1">
                            <h6 class="text-base ">Price: </h6>
                            <p class="text-base text-gray-500">KSH 1200</p>
                        </div>
                       
                        <div class="mb-2">
                            <h6 class="text-base ">Quantity: </h6>
                            <div class=" flex gap-2 items-center">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base">
                                    -
                                </button>
                                <input type="number" class=" border border-gray-400 py-2 px-4 w-20">
                                <button class=" border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-4 py-2  text-base ">
                                        +
                                </button>
                            </div>
                        </div>
                        <div class="">
                            <button class="border hover:bg-red-600 hover:text-white group flex items-center gap-2 px-4 py-2  text-base ">
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
                    <button class="bg-red-600  hover:text-white text-white hover:bg-red-400 px-4 py-2  text-base ">
                        Clear Cart
                     </button>

                    <button class="bg-green-600  hover:text-white text-white hover:bg-green-400 px-4 py-2  text-base">
                        Check out
                    </button>
             </div>
        </div>
      </div>
  </div>
</template>

<script>
import jacket from '../assets/jacket2.jpg';
export default {
   data(){
     return{
        jacket
     }
   }
}
</script>

<style>

</style>