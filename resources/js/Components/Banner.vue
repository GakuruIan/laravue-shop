<script>

</script>

<template>
    <div class="min-h-[65vh] w-full mt-12 md:mt-20">

        <div class="banner min-h-[65vh]  flex items-center justify-center w-full ">
        <div class=" flex flex-col gap-8 items-center relative z-5">
                <h1 class="text-4xl md:text-5xl text-white ">Find your perfect</h1>
                <h4 class="text-base text-center text-white px-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, laborum.</h4>
                <a href="/shop" class="flex text-white items-center justify-center border border-white hover:bg-white group-hover hover:text-gray-600 px-6 py-2 w-[75%] text-lg mt-4">
                    Shop 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 ml-4 h-5 hover:stroke-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </a>
                <span class="animate-bounce mt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-white">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
        </div>
            
       </div>
    </div>
   
</template>

<style scoped>
   .banner{
    background-image:url('../assets/pic1.jpg');
    width: 100%;
    height: 100%;
    object-fit: cover;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
   }
   .banner::before{
    position: absolute;
    content: '';
    top:0;
    left:0;
    bottom: 0;
    right: 0;
    background: rgba(0,0, 0,0.7);
   }
</style>
