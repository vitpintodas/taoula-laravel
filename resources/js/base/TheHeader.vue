<script setup>
import { ref, onMounted } from 'vue';
import { getImagePath } from '../utils/getImagePath';

const nbCoins = 0;
const isBackPossible = ref(false);

const goBack = () => {
  window.history.back();
};

const updateBackPossible = () => {
  isBackPossible.value = window.history.length > 1;
};

onMounted(() => {
  updateBackPossible();
});

window.addEventListener('popstate', () => {
  updateBackPossible();
});
</script>

<template>
  <header>
    <div class="back-arrow">
      <img
        :src="getImagePath('arrow-back')"
        href="#shop"
        v-if="isBackPossible"
        @click="goBack"
      />
    </div>

    <div class="c3-logo">
      <img :src="getImagePath('c3-logo')" href="#un" />
    </div>

    <div class="right-section">
      <div class="coins">
        <img :src="getImagePath('coin')" />
        <p>{{ nbCoins }}</p>
      </div>

      <div class="shop">
        <img :src="getImagePath('shop')" href="#shop" />
      </div>
    </div>
  </header>
</template>

<style scoped>
</style>
