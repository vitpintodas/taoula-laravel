<script setup>
  import { defineProps } from 'vue'

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

  //s'occupe de générer le chemin du svg
  const getImagePath = (type) => {
    // lien suceptible de changer en fonction de l'ordinateur ou du serveur
    // return `http://[::1]:5174/resources/assets/svg/${type}.svg`
    return `./resources/assets/svg/${type}.svg`

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
            <h2 class="titre2">{{ title }}</h2>
            <p class="description">{{ description }}</p>
          </div>


            <p class="small-description">{{ info }}</p>
          </div>
    </div>
  </a>

</template>

<!-- css : BaseMainCards.css -->