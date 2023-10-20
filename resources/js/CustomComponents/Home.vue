<template>
  <div class="">
    <Banner/>
    <CartDrawer/>
    <Catergory/>
    <div class="py-2   max-w-6xl mx-auto" ref="TrendingContainer">
        <Row title="Featured Products "/>
    </div>
    <Ad/>
    <div class="py-2   max-w-6xl mx-auto" ref="TrendingContainer">
       <Row title="Trending Now" :data="TrendingProducts" :Loading="loading" />
    </div>
    <Policy/>
    </div>
</template>

<script setup>
import Banner from '../Components/Banner.vue'
import CartDrawer from './CartDrawer.vue'
import Catergory from './Catergory.vue'
import Row from '../CustomComponents/Row.vue'
import Ad from '../CustomComponents/Ad.vue'
import Policy from './Policy.vue'

import { ref,onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import  { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 })

let TrendingContainer = ref(null)
let TrendingProducts = ref(null)
let loading = ref(false)

let loadData =()=>{
  loading.value = true

 fetch('/products/trending')
   .then((response)=>{
    if(response.ok && response.status === 200){
      return response.json();
    }
   })
   .then((data)=>{
     loading.value = false
     TrendingProducts.value = data;
   })
   .catch((err)=>{
     loading.value = false
     console.log(err)
   })
}

onMounted(()=>{
   const options = {
    root: null, 
    rootMargin: '0px', 
    threshold: 0.1, 
  };

  const intersectionObserver = new IntersectionObserver(handleIntersection, options);
  
  intersectionObserver.observe(TrendingContainer.value);

  function handleIntersection(entries){
     entries.forEach((entry) => {
      if (entry.isIntersecting) {
        loadData();
        intersectionObserver.unobserve(TrendingContainer.value);
      }
    });
  }

})

</script>

<style>

</style>