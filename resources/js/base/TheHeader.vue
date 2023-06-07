<script setup>

import { getImagePath } from '../utils/getImagePath';

//A changer pour mettre le nombre de coins de l'utilisateur
const nbCoins = 0;

//Permet de retourner en arrière
const goBack = () => {
  window.history.back();
}

//Fonction permettant de voir si un retour en arrièere est possible
const backPossible = () => {
  if (window.history.length > 1) {
    return true;
  }
}


</script>

<template>

<header>
  <div class="back-arrow">
    <img :src="getImagePath('arrow-back')" href="#shop" v-if="backPossible" @click="goBack">
  </div>

  <div class="c3-logo">
    <img :src="getImagePath('c3-logo')" href="#un">
  </div>

  <div class="right-section">
    <div class="coins">
      <img :src="getImagePath('coin')">
      <p>{{ nbCoins }}</p>
    </div>

    <div class="shop">
      <img :src="getImagePath('shop')" href="#shop">
    </div>
  </div>
</header>

</template>


<style>
    
</style>