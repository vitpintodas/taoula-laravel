<script setup>
  import { defineProps } from 'vue'
  import { getImagePath } from '../utils/getImagePath.js';
  
  defineProps({
    title: {
      type: String,
      required: true
    },

    type: {
      type: String,
      required: false
    },

   
  })
</script>

<template>
  <button class="baseDefiButton-container">
    
      <div class="baseDefiButton-type">
        <img :src="getImagePath(type)"/>
      </div>
      <div>
        <h2 class="titre">{{ title }} </h2>
      </div>
    
  </button>
</template>

<style scoped>

</style>