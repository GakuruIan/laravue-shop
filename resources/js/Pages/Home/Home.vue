<template>
   <Navbar/>
   <Home/>
   <FooterVue/>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import Home from '../../CustomComponents/Home.vue'
import FooterVue from '../../CustomComponents/Footer.vue';

export default {
  components:{
    Navbar,
    Home,
    FooterVue,
  }
}
</script>

<style>

</style>