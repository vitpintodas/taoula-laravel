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
    return `http://[::1]:5174/resources/assets/svg/${type}.svg`
  }

</script>
<template>
  <a :href="link">
    <div class="container">
          <div class="type">
            <img :src="getImagePath(type)"/>
          </div>
          <div class="textContainer">
          <div>
            <h2>{{ title }}</h2>
            <p>{{ description }}</p>
          </div>


            <p class="info">{{ info }}</p>
          </div>
    </div>
  </a>

</template>
<style>
@import '././resources/css/app.css';
/* ce code sert à tej les marges par défauts sur les textes */
h2, p{
  margin: 0;
}

.container {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  height: 98px;
  background-color: #393939;
  flex-direction: row;
  min-width: auto;
  max-width: 450px;
  color: #fff;
  border-radius: 10px;
  margin: 10px;
}

.textContainer {
  padding: 5px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.type {
display: flex;
width: 86px;
height: 98px;
background: #F05CC8;

border-radius: 10px 0px 0px 10px;
justify-content: center;
align-items: center;
}

.info{
  font-size: small;
  color : #777777;
}
</style>

