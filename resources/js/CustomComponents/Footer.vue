<template>
  <div class="py-4 bg-[#262626] ">
     <div class="max-w-5xl mx-auto py-4 px-2 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="">
                <h1 class="text-xl mb-2 text-gray-100"> About Laravue</h1>
                <p class="text-sm text-gray-100">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi et tenetur sunt beatae nihil quis minus hic odit itaque. Natus, ad maiores dignissimos saepe illum totam corporis. Repellat, at quidem?</p>
            </div>

           <div class="">
            <h1 class="text-base mb-2 text-gray-100">Caterogies</h1>
            <ul class="pl-2">
                <li class="text-sm mb-2 md:mb-4 text-gray-100 hover:text-gray-400 hover:cursor-pointer">
                    <a href="">Men</a>
                </li>
                <li class="text-sm mb-2 md:mb-4 text-gray-100 hover:text-gray-400 hover:cursor-pointer">
                    <a href="">Women</a>
                </li>
                <li class="text-sm mb-2 md:mb-4 text-gray-100 hover:text-gray-400 hover:cursor-pointer">
                    <a href="">Shoe</a>
                </li>
                <li class="text-sm mb-2 md:mb-4 text-gray-100 hover:text-gray-400 hover:cursor-pointer">
                    <a href="">Baby</a>
                </li>
            </ul>
           </div>

           <div class="">
              <h1 class="text-base mb-2 text-gray-100">Subscribe to our News Letter</h1>
                <form >
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                    <input type="text" id="search-navbar" class="block w-full p-3  pl-10 text-sm text-white bg-[#262626] focus:ring-gray-200 focus:border-gray-200"  placeholder="Jane@gmail.com">
                    </div>
                    <button class="flex text-white items-center justify-center border border-white hover:bg-white group-hover hover:text-gray-600 px-6 py-2 w-full text-lg mt-4">
                        Join
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>

                    </button>
                    
                </form>
           </div>
        </div>
     </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>