<template>
  <Navbar/>
  <MiniBanner catergory="Products" :img="shopping1"/>
  <Filter/>
   <Products/>
   <Footer/>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import MiniBanner from '../../CustomComponents/MiniBanner.vue';
import shopping1 from '../../assets/shopping.jpg'
import Filter from '../../CustomComponents/Filter.vue';
import Products from '../../CustomComponents/Products.vue';
import Footer from '../../CustomComponents/Footer.vue';

export default {
  components:{
    Navbar,
    MiniBanner,
    Filter,
    Products,
    Footer
  },
  data(){
    return {
      shopping1
    }
  }
}
</script>

<style>

</style>