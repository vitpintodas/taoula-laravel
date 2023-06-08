<script setup>
import { ref, watch } from 'vue';
import BaseInput from "../base/BaseInput.vue";
import BaseSmallCards from "../base/BaseSmallCards.vue";

const cards = ref([
  {
    title: "ACDC - Al in blak",
    type: "music",
    likeStatus: false,
  },
  {
    title: "ACDC - All in black",
    type: "music",
    likeStatus: false,
  },
  // ... Ajoutez les autres cartes ici
]);

const filtre = ref('');
const showTitle = ref(true);

const updateFiltre = (val) => {
  filtre.value = val;
  showTitle.value = val === ''; // Vérifie si la valeur du filtre est vide
};

const filteredCards = ref(cards.value);

watch(filtre, (val) => {
  if (val === "") {
    filteredCards.value = cards.value;
  } else {
    filteredCards.value = cards.value.filter((card) =>
      card.title.toLowerCase().includes(val.toLowerCase())
    );
  }
});
</script>

<template>
  <BaseInput class="marginTB marginLR" :value="filtre" type="searchInput" placeholder="Rechercher..." @emit-input="updateFiltre($event)" />
  <p class="titre2 marginLR marginT marginB" v-if="showTitle">Rediffusions de la semaine</p>

  <div>
    <p class="small-description marginLR">05.06.2023</p>
    <BaseSmallCards v-for="card in filteredCards" :key="card.title" :title="card.title" :type="card.type" :likeStatus="card.likeStatus" />
  </div>
</template>

<style scoped>
</style>
