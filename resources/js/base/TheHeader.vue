<script setup>

import { getImagePath } from '../utils/getImagePath';

//A changer pour mettre le nombre de coins de l'utilisateur
const nbCoins = 0;

//A changer pour mettre si le bouton back est possible ou non
const backPossible = true;


</script>

<template>

<header>
  <div class="back-arrow">
    <img :src="getImagePath('arrow-back')" href="#shop" v-if="backPossible">
  </div>

  <div class="c3-logo">
    <img :src="getImagePath('c3-logo')" href="#home">
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