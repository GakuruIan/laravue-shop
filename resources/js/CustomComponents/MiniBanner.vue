<template>
  <div class="h-72 relative bg-[rgba(0,0,0,0.6)] flex flex-col items-center justify-center w-full mt-12 md:mt-20">
        <img :src="img" alt="" class="h-full w-full object-cover bg-center absolute mix-blend-overlay"> 
        <div class=" flex flex-col gap-8 relative items-center justify-center  z-5">
            <h1 class="text-4xl md:text-5xl text-white "> {{ title }}</h1> 
            <span class="animate-bounce mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>
         </div>
  </div>
</template>

<script setup>

const props = defineProps({
  title:String,
  img:String
})


</script>


