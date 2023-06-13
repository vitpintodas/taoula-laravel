<template>
    <div class="defi-container">
      <h2>Sujet du défi</h2>
      <BaseInput class="defi-input" placeholder="Sujet du défi..." @input="changeValue($event)">
      </BaseInput>
      <h2>Type du défi</h2>
      <div class="typeDefi-container">
        <div>
          <BaseDefiButton title="Rapidité" type="fast" :class="{ active: defiRapidite }" @click="rapidite"></BaseDefiButton>
          <BaseDefiButton title="Tirage parmi bonne réponse" type="box" :class="{ active: defiTirage }" @click="tirage"></BaseDefiButton>
        </div>
        <div class="defi2">
          <BaseDefiButton title="Gagnant sélectionné à la main" type="thumbsUp" :class="{ active: defiSelection }" @click="gagne"></BaseDefiButton>
          <BaseDefiButton title="Les bonnes réponses gagnent" type="thumbsUp" :class="{ active: defiMain }" @click="main"></BaseDefiButton>
        </div>
      </div>
      <div class="affiche-defi">
        <div v-if="defiRapidite" id="defi-rapidite">
          <h1>caca1</h1>
        </div>
        <div v-if="defiTirage" id="defi-tirage">
          <h1>caca2</h1>
        </div>
        <div v-if="defiSelection" id="defi-main">
          <h1>caca3</h1>
        </div>
        <div v-if="defiMain" id="defi-gagne">
          <h1>caca4</h1>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
import { ref, onMounted } from "vue";
import BaseDefiButton from "../../base/BaseDefiButton.vue";
import BaseInput from "../../base/BaseInput.vue";

const defiRapidite = ref(false);
const defiTirage = ref(false);
const defiSelection = ref(false);
const defiMain = ref(false);

const rapidite = () => {
  defiRapidite.value = true;
  defiTirage.value = false;
  defiSelection.value = false;
  defiMain.value = false;
  updateActiveState("rapidite");
};

const tirage = () => {
  defiRapidite.value = false;
  defiTirage.value = true;
  defiSelection.value = false;
  defiMain.value = false;
  updateActiveState("tirage");
};

const gagne = () => {
  defiRapidite.value = false;
  defiTirage.value = false;
  defiSelection.value = true;
  defiMain.value = false;
  updateActiveState("selection");
};

const main = () => {
  defiRapidite.value = false;
  defiTirage.value = false;
  defiSelection.value = false;
  defiMain.value = true;
  updateActiveState("main");
};

const updateActiveState = (activeButton) => {
  const url = new URL(window.location.href);
  url.searchParams.set("activeButton", activeButton);
  window.history.replaceState({}, "", url);
};

onMounted(() => {
  const url = new URL(window.location.href);
  const activeButton = url.searchParams.get("activeButton");
  if (activeButton) {
    switch (activeButton) {
      case "rapidite":
        rapidite();
        break;
      case "tirage":
        tirage();
        break;
      case "selection":
        gagne();
        break;
      case "main":
        main();
        break;
      default:
        break;
    }
  }
});
</script>
  
  <style></style>
  