<template>
   <Navbar/>
   <div class="min-h-screen mt-12 md:mt-20 max-w-5xl mx-auto md:px-0 px-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 py-3">
            <div class="">
                <img :src="tshirt" alt="" class=" w-full object-cover mb-6">
                <div class="grid grid-cols-3 gap-2">
                  <img :src="tshirt" alt="" srcset="" class="h-32 w-full object-cover">
                  <img :src="tshirt" alt="" srcset="" class="h-32 w-full object-cover">
                  <img :src="tshirt" alt="" srcset="" class="h-32 w-full object-cover">
                </div>
            </div>
            <div class="">
              <h1 class="text-3xl md:text-6xl mb-4">Product name</h1>
              <h6 class="text-2xl">KSh 12000</h6>

               <!-- size -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Size :</p>
                <div class="flex items-center gap-3">
                    <span class="flex items-center justify-center px-4 py-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">sm</span>
                    <span class="flex items-center justify-center px-4 py-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">md</span>
                    <span class="flex items-center justify-center px-4 py-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">lg</span>
                    <span class="flex items-center justify-center px-4 py-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer">xl</span>
                </div>
            </div>

            <!-- color -->

            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Color :</p>
                <div class="flex items-center gap-3">
                    <span class="flex items-center justify-center p-4 rounded-full bg-indigo-300 hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-4 rounded-full bg-gray-900 hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-4 rounded-full bg-[#ff0] hover:cursor-pointer"></span>
                    <span class="flex items-center justify-center p-4 rounded-full bg-cyan-700 hover:cursor-pointer"></span>
                </div>
            </div>

            <!-- stock -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">In Stock:</p>
                 <p class="text-sm text-gray-400">7 remaining</p>
            </div>

            <!-- Quantity -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Quantity:</p>
                 <div class=" flex gap-2 items-center">
                  <button class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base">
                     -
                 </button>
                  <input type="number" class="px-4 border border-gray-400 py-2 w-1/2">
                  <button class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base">
                        +
                  </button>
                 </div>
            </div>


            <!-- buttons -->
              <div class="flex items-center gap-2">
                <button class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base mt-4">
                      Add to WishList
                </button>
                <button class="flex  items-center justify-center border border-gray-400 bg-[#222] text-white hover:bg-transparent group-hover hover:text-gray-500 px-6 py-2 w-full text-base mt-4">
                      Add to Cart
                </button>
              </div>
            </div>
        </div>
        <div class="">
        <Row title="Related Products"/>
      </div>
   </div>
  
   <Footer/>
</template>

<script>
import Navbar from '../../Components/Navbar.vue'
import Footer from '../../CustomComponents/Footer.vue'
import tshirt from '../../assets/tshirt.jpg'
import Row from '../../CustomComponents/Row.vue'
export default {
  components:{
    Navbar,
    Footer,
    Row
  },
  data(){
    return{
        tshirt
    }
  }
}
</script>

<style>

</style>