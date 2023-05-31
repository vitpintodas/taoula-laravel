<script setup>
  import { defineProps } from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  defineProps({
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: true
    },

    link: {
      type: String,
      required: true
    },

    info: {
      type: String,
      required: false
    }
  })


  const cutTitle = (title) => {
    if (title.length > 25) {
      return title.substring(0, 25) + '...'
    }
    return title
  }

</script>
<template>
  <a :href="link">
    <div class="baseMainCard-container">
          <div class="baseMainCard-type">
            <img :src="getImagePath(type)"/>

          </div>
          <div class="baseMainCard-textContainer">
          <div>
            <h2 class="titre2">{{ cutTitle(title) }} </h2>
            <p class="description">{{ description }}</p>
          </div>


            <p class="small-description">{{ info }}</p>
          </div>
    </div>
  </a>

</template>

<!-- css : BaseMainCards.css -->