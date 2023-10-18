<template>
  <div class="relative min-h-96 my-6 py-2  px-2 md:px-4" ref="categoryContainer">
 
      <div>
          <h1 class="text-xl md:text-2xl mb-4">Our Categories</h1>
              <div v-if="loading" class="h-44 flex items-center justify-center">
                <half-circle-spinner
                :animation-duration="1000"
                :size="60"
                color="#ff1d5e"
              />
              </div>
            <carousel v-else v-bind="settings" :breakpoints="breakpoints">
                <slide v-for="catergory in Categories" :key="catergory.id" :wrapAround="true" :transition="500">
                  <div class="flex items-center justify-center h-44  md:h-72 w-full mx-1 cursor-pointer  relative bg-[rgba(0,0,0,0.6)]">
                    <img :src="catergory.image"  class="h-full w-full object-fit rounded-sm bg-center absolute mix-blend-overlay">
                    <div class="border border-white w-44 px-4 py-2 z-10">
                      <h1 class="text-base text-white">{{catergory.catergory_name}}</h1>
                    </div>
                  </div>
                </slide>

                <template #addons>
                  <pagination />
                </template>
            </carousel>
        </div>
    </div>

</template>

<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import { onMounted, ref } from 'vue';
import { HalfCircleSpinner } from 'epic-spinners'

let Categories = ref([])

let categoryContainer = ref(null)
let loading = ref(false)

let loadData =()=>{
  loading.value = true

 fetch('/catergory/all')
   .then((response)=>{
    if(response.ok && response.status === 200){
      return response.json();
    }
   })
   .then((data)=>{
     loading.value = false
     Categories.value = data;
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
  
  intersectionObserver.observe(categoryContainer.value);

  function handleIntersection(entries){
     entries.forEach((entry) => {
      if (entry.isIntersecting) {
        loadData();
        intersectionObserver.unobserve(categoryContainer.value);
      }
    });
  }

})


let settings = {
  itemsToShow:1,
  snapAlign:'center'
}

let breakpoints = {
     
      280: {
        itemsToShow: 1,
        snapAlign: 'center',
      },
      430:{
        itemsToShow: 2.4,
      },
      // 1024 and up
      1024: {
        itemsToShow: 3.5,
        snapAlign: 'center',
      },
    }

</script>

