<template>
   <div class="py-2">
             <h1 class="text-6xl text-gray-800 text-center mb-2 py-2 tracking-wide">Laravue</h1>
             <h6 class="text-base text-gray-400 text-center tracking-wide">{{ subtitle }}</h6>
   </div>
</template>

<script>
export default {
 props:{
    subtitle:{
        type:String,
        required:true
    }
 }
}
</script>

<style>

</style>