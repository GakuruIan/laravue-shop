<template>
  <div class="">
    <Banner/>
    <CartDrawer/>
    <Catergory/>
    <Row title="Trending now"/>
    <Ad/>
    <Row title="Featured Products "/>
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

let message = ref('')
const page = usePage()

onMounted(()=>{
   if(page.props.message){
      message.value = page.props.message
      toaster.success(message.value)
   }
})

</script>

<style>

</style>