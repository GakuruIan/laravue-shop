<template>
  <div class="my-10">
    <div class="ad min-h-[65vh] flex flex-col items-center justify-center w-full ">
           <div class="max-w-4xl h-full flex flex-col items-center justify-center gap-4 mx-auto z-20">
             <h1 class="text-4xl text-center  md:text-6xl text-white ">Inside Laravue: A sneak peak of Into Our Amazing Shop</h1>
             <button class="flex text-white items-center justify-center border border-white hover:bg-white group-hover hover:text-gray-600 px-6 py-2 w-[75%] text-lg mt-4">
                    Shop 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 ml-4 h-5 hover:stroke-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
            </button>
           </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>
   .ad{
    background-image: url('../assets/pic6.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    background-attachment: fixed;
   }
   .ad::before{
    position: absolute;
    content: '';
    top:0;
    left:0;
    bottom: 0;
    right: 0;
    background: rgba(0,0, 0,0.7);
   }
</style>