<template>
  <Navbar/>
  <MiniBanner catergory="Products" :img="shopping1"/>
   <Filter/>
   <Products :products="products"/>
   <Footer/>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue'
import MiniBanner from '@/CustomComponents/MiniBanner.vue';
import shopping1 from '@/assets/shopping.jpg'
import Filter from '@/CustomComponents/Filter.vue';
import Products from '@/CustomComponents/Products.vue';
import Footer from '@/CustomComponents/Footer.vue';

const  {products}  = defineProps(['products']);


</script>

<style>

</style>