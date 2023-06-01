<script setup>

import BaseMainCards from './base/BaseMainCards.vue';
import TheHeader from './base/TheHeader.vue';
// import LiveSvg from './assets/vue.svg'


</script>

<template>  
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="live" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Billets pour paléo" description="Tente de ganger des billets pour paléo" type="contest" link="#unlien2"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="star" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="poll" link="#unLien" info="05:20:23"/>
  <TheHeader :types='["home", "search", "live", "fav", "account"]' :links='["#1", "#2", "#3", "#4", "#5"]' :names='["Accueil", "Recherche", "Live", "Favoris", "Compte"]' />

  

</template>

<style scoped>
</style>