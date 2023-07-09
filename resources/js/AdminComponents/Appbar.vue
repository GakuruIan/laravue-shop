<template>
    <div class="w-full fixed top-0 left-0 bg-white z-40 border-b">
         <div class="relative h-16 px-2  md:px-4 md:h-20 max-w-6xl mx-auto flex justify-between items-center gap-2 ">
             <div class="flex gap-2">
                      <a href="/" id="logo" class="text-2xl text-center">Laravue</a>
             </div>
  
             <!-- menu items -->
             <ul class="fixed top-0 left-[-100%] bg-[#333] md:relative md:left-0 md:bg-white flex-col justify-center flex md:flex-row items-center gap-6 md:gap-8">
  
              <!-- close btn -->
                  <span class="absolute md:hidden right-4 top-10 p-2 group-hover border rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-white hover:stroke-gray-400 hover:cursor-pointer">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </span>
                
                 <li class="mt-2 text-white md:text-gray-500  hover:text-gray-400 hover:cursor-pointer">
                      <a href="" class="">Dashboard</a>
                  </li>
                  <li class="mt-2 text-white md:text-gray-500 hover:text-gray-400 hover:cursor-pointer">
                      <a href="">Products</a>
                  </li>
  
                  <li class="mt-2 text-white md:text-gray-500 hover:text-gray-400 hover:cursor-pointer">
                      <a href="">Orders</a>
                  </li>
  
                  <li class="mt-2 text-white md:text-gray-500 hover:text-gray-400 hover:cursor-pointer">
                      <a href="">Delieveries</a>
                  </li>
                  
             </ul>
             
           

             <!-- Icons -->
             <div class="hidden md:flex md:items-center gap-4">
                <span class="p-2 group-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:stroke-gray-400 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
              
                 <Dropdown>
                    <template #trigger>
                        <span class="p-2  group-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:stroke-gray-400 hover:cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </span>
                    </template>

                    <template #content>
                        <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
                        <p class="text-sm "> Manage Account</p>
                        </div>
                        <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
                        <p class="text-sm ">Profile</p>
                        </div>
                        <div class="py-2 px-2 hover:cursor-pointer border-t group hover:bg-gray-100">
                        <p class="text-sm ">Log out</p>
                        </div>
                    </template>
                 </Dropdown>
                 
              
             </div>
  
             <!-- mobile design icons -->
  
             <div class="flex gap-1 items-center md:hidden">
  
               <span class="p-2 group-hover">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:stroke-gray-400 hover:cursor-pointer">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </span>
  
              <span class="md:hidden p-2  group-hover">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-5 h-5 hover:stroke-gray-400 hover:cursor-pointer">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
              </span>
             </div>
             
         </div>
    </div>
  </template>

<script>
import Dropdown from '../Components/Dropdown.vue'
import TextInput from '../Components/TextInput.vue'
export default {
  components:{
    Dropdown,
    TextInput
  }
}
</script>

<style>

</style>