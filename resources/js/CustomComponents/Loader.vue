<template>
  <div class="fixed top-0 left-0 w-full min-h-screen bg-white flex items-center justify-center">
    <half-circle-spinner
        :animation-duration="1000"
        :size="60"
        color="#ff1d5e"
    />
  </div>
</template>

<script setup>
 import { HalfCircleSpinner } from 'epic-spinners'
</script>
