<template>
  <div class="mt-12 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
    <Cards/>
   <div class="py-2">
     <Chart header="Sales" :chartData="data" :options="options" />
   </div>
  </div>
</template>

<script>
import Chart from '../AdminComponents/Chart.vue'
import Cards from '../AdminComponents/Cards.vue'
export default {
    components:{
      Chart,
      Cards
    },
  data(){
     return{
        data : {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov'],
        datasets: [{
            label: 'My First Dataset',
            data: [10, 59, 80, 81, 56, 55, 40,50,30,60,80],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            fill:true,
            backgroundColor:'rgba(75, 192, 192,0.1)',
            tension: 0.1
        }]
     },
     options : {
        scales: {
        y:{
            beginAtZero:true
        }
    },
        maintainAspectRatio:false
     }
  }
}
}
</script>

<style>

</style>