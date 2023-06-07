<script setup>
  import { defineProps } from 'vue'
  import { getImagePath } from '../utils/getImagePath';
  
  defineProps({
    title: {
      type: String,
      required: true
    },

    link: {
      type: String,
      required: false
    },

    type: {
      type: String,
      required: false
    },

    size: {
      type: String,
      required: true,
      default: 'large'
    }
   
  })
</script>

<template>
    <a :href="link">
      <div :class="size">
        <div v-if="type" class="baseButton-type">
          <img :src="getImagePath(type)"/>
        </div>
        <div class="baseButton-textContainer">
          <h2 class="titre">{{ title }} </h2>
        </div>
      </div>
    </a>
  </template>

<style scoped>

</style>