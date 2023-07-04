<template>
  <div class="fixed top-0 bottom-0 right-0 left-[-100%] mt-16 md:mt-20  w-full backdrop-sepia-0 bg-[rgba(0,0,0,0.6)] z-30">
        <div class="absolute right-0 bg-white w-64  h-screen px-2">
            <header class="flex justify-between items-center my-2">
                <h1 class="text-xl text-gray-600 text-center flex-1">Cart (0)</h1>
                <span class="p-1 border rounded-full group hover:cursor-pointer hover:border-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-gray-500 group-hover:stroke-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </header>

            <div class="max-h-[520px] scrollbar overflow-y-scroll w-full">

                <!-- single product in cart -->
               <!-- <div class="flex items-center gap-2 py-2 border-b">
                  <img :src="jacket" alt="" class="h-18 w-14 object-fit">
                  <div class="flex flex-col gap-1 flex-1">
                    <h6 class="text-sm text-gray-400">product name </h6>
                    <h6 class="text-sm text-gray-400">quantity (1)</h6>
                    <div class="flex items-center gap-1">
                        <span class="flex items-center justify-center p-1.5 rounded-full bg-indigo-300 hover:cursor-pointer"></span>
                    </div>
                    <h6 class="text-sm text-gray-400">ksh 1200</h6>
                  </div>

                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-red-400 group-hover:stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                  </span>
               </div> -->
                <!-- single product in cart -->

                <!-- empty cart -->
                <div class="h-56 flex items-center justify-center flex-col gap-2 w-full">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 stroke-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </span>
                        <p class="text-base text-gray-300">Empty cart</p>
                </div>
                <!-- empty cart -->

            </div>
            <div class="flex flex-col gap-2 pt-4 pb-2">
                    <button class=" border border-gray-400 hover:bg-[#292929] group-hover hover:text-white px-4 py-2  text-base ">
                          View cart          
                    </button>

                    <button class="  bg-red-500 text-white hover:bg-red-400 group-hover hover:text-white px-4 py-2  text-base ">
                             clear cart         
                    </button>
            </div>
        </div>
  </div>
</template>

<script>
import jacket from '../assets/jacket.jpg'
export default {
  data(){
    return {
     jacket
    }
  }
}
</script>

<style>

</style>