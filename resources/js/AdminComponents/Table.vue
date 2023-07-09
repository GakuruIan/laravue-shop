<template>
  <div class="h-full py-4 w-full">
    <h1 class="text-xl md:text-2xl text-gray-500 mb-3">{{ header }}</h1>
     
    <ag-grid-vue
    class="ag-theme-alpine w-full h-72"
    :columnDefs="columnDefs"
    :rowData="rowData"
    @first-data-rendered="onFirstDataRendered"
    >
  </ag-grid-vue>
  </div>
</template>

<script>
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-alpine.css";
import { AgGridVue } from "ag-grid-vue3";

export default {
    props:{
        header:{
            type:String,
            required:true
        },
        columnDefs:{
          type:Array,
          required:true
        },
        rowData:{
            type:Array,
            required:true
        }
    },
    components:{
       AgGridVue
    },
   methods:{
    onFirstDataRendered(params) {
      params.api.sizeColumnsToFit();
    },
   }
   
}
</script>

<style>

</style>