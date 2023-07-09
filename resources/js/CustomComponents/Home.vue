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

<script>
import Banner from '../Components/Banner.vue'
import CartDrawer from './CartDrawer.vue'
import Catergory from './Catergory.vue'
import Row from '../CustomComponents/Row.vue'
import Ad from '../CustomComponents/Ad.vue'
import Policy from './Policy.vue'

export default {
    components:{
    Banner,
    Catergory,
    Row,
    Ad,
    Policy,
    CartDrawer
  }
}
</script>

<style>

</style>