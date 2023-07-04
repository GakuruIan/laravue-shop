<template>
   <Navbar/>
   <Banner/>
   <CartDrawer/>
   <Catergory/>
   <Row title="Trending now"/>
   <Ad/>
   <Row title="Featured Products "/>
   <Policy/>
   <FooterVue/>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import Banner from '../../Components/Banner.vue';
import Catergory from '../../CustomComponents/Catergory.vue';
import Row from '../../CustomComponents/Row.vue';
import Ad from '../../CustomComponents/Ad.vue';
import Policy from '../../CustomComponents/Policy.vue';
import FooterVue from '../../CustomComponents/Footer.vue';
import CartDrawer from '../../CustomComponents/CartDrawer.vue';
export default {
  components:{
    Navbar,
    Banner,
    Catergory,
    Row,
    Ad,
    Policy,
    FooterVue,
    CartDrawer
  }
}
</script>

<style>

</style>