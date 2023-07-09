<template>
    <Appbar/>
    <div class="mt-12 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
        <Anaylsis/>
    </div>
</template>

<script>
import Appbar from '../../AdminComponents/Appbar.vue'
import Anaylsis from '../../AdminComponents/Anaylsis.vue';
export default {
 components:{
    Appbar,
    Anaylsis
 }
}
</script>

<style>

</style>