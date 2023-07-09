<template>
 <div class="py-4 h-96">
    <h1 class="text-3xl text-gray-500 mb-3">{{ header }}</h1>
        <canvas id="chart" class="h-full"></canvas>
 </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
    props:{
      header:{
        type:String,
        required:true
      },
      chartData:{
        type:Object,
        default:()=>({labels:[],datasets:[]}),
        validator:(value)=>{
            return Array.isArray(value.labels) && Array.isArray(value.datasets)
        }
      },
      options:{
        type:Object,
      }
    },
    mounted(){
        const chartCanvas = document.getElementById('chart');

        const chart  = new Chart(chartCanvas,{
            type:'line',
            data:this.chartData,
            options:this.options,
        });
        chart
    }
}
</script>

<style>

</style>