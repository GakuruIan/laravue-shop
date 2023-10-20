<template>
 <div class="max-w-6xl mx-auto px-2 md:px-0">
  <div class="py-4 flex my-4  border-t border-b h-16 items-center justify-between h-12 ">
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
        </svg>
        <h6 class="text-base">Filter</h6>
      </div>
      
      <Dropdown>
         <template #trigger>
            <div class="py-2 flex items-center gap-1 px-4 border border-[#222] hover:cursor-pointer group hover:bg-[#222]">
                <p class="text-base group-hover:text-white">Sort By</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 group-hover:stroke-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
         </template>

         <template #content>
            <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
               <p class="text-sm"> Price</p>
            </div>
            <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
               <p class="text-sm">Size</p>
            </div>
            <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
               <p class="text-sm">Trending</p>
            </div>
            <div class="py-2 px-2 hover:cursor-pointer group hover:bg-gray-100">
               <p class="text-sm">New</p>
            </div>
         </template>
      </Dropdown>
  </div>

  <div class="transition ease-in duration-750 hidden">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-b border-gray-200 pb-3 px-2 md:px-0">
     <div class="">
        <label for="" class="text-gray-500 text-base"> Catergory</label>
        <select type="text" id="search-navbar" class="mt-1 block w-full p-3  px-2 text-sm focus:ring-gray-200 focus:border-gray-200"  placeholder="Catergory">
            <option value="">Men</option>
            <option value="">Women</option>
            <option value="">Shoe</option>
            <option value="">Baby</option>
        </select>
     </div>

     <div class="">
        <label for="" class="text-gray-500 text-base"> Size</label>
        <select type="text" id="search-navbar" class="mt-1 block w-full p-3  px-2 text-sm focus:ring-gray-200 focus:border-gray-200"  placeholder="Catergory">
            <option value="">sm</option>
            <option value="">Md</option>
            <option value="">Lg</option>
            <option value="">xl</option>
        </select>
     </div>

     <div class="">
        <button class="py-3 mt-6 border border-gray-200 hover:bg-[#222]  hover:text-white px-6 py-2 w-full text-base">
            Filter
        </button>
     </div>

  </div>
</div>
</div>
</template>

<script>
import Dropdown from '../Components/Dropdown.vue';
import DropdownLink from '../Components/DropdownLink.vue'
import Checkbox from '../Components/Checkbox.vue'
export default {
   components:{
    Dropdown,
    DropdownLink,
    Checkbox
}
}
</script>

<style>

</style>