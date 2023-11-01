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
import {baseURL} from '../axios.js'

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

  
baseURL.get('/products/trending')
.then((response)=>{
  if(response.statusText === 'OK' && response.status === 200){
    TrendingProducts.value = response.data
    loading.value= false
  }
})
.catch((error)=>{
   loading.value= false
   toaster.error(error.message)
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