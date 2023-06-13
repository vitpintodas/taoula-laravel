<script setup>
import BaseDefiButton from '../../base/BaseDefiButton.vue';
import BaseInput from '../../base/BaseInput.vue';
import { ref } from "vue";
import isActive from '../../base/BaseDefiButton.vue';


const defiRapidite = ref(false);
const defiTirage = ref(false);
const defiSelection = ref(false);
const defiMain = ref(false);

const rapidite = () => {
    defiRapidite.value = true;
    defiTirage.value = false;
    defiSelection.value = false;
    defiMain.value = false;
    isActive.value = true;
}

const tirage = () => {
    defiRapidite.value = false;
    defiTirage.value = true;
    defiSelection.value = false;
    defiMain.value = false;
    isActive.value = true;
}

const gagne = () => {
    defiRapidite.value = false;
    defiTirage.value = false;
    defiSelection.value = true;
    defiMain.value = false;
    isActive.value = true;
}

const main = () => {
    defiRapidite.value = false;
    defiTirage.value = false;
    defiSelection.value = false;
    defiMain.value = true;
    isActive.value = true;
}

</script>

<template>
    <div class="defi-container">
        <h2>Sujet du défi</h2>
        <BaseInput class="defi-input" placeholder="Sujet du défi..." @input="changeValue($event)">
        </BaseInput>
        <h2>Type du défi</h2>
        <div class="typeDefi-container">
            <div>
                <BaseDefiButton title="Rapidité" type="fast" @click="rapidite()" ></BaseDefiButton>
                <BaseDefiButton title="Tirage parmi bonne réponse" type="box" @click="tirage()"></BaseDefiButton>
            </div>
            <div class="defi2">
                <BaseDefiButton title="Gagnant sélectionné à la main" type="thumbsUp"  @click="main()">
                </BaseDefiButton>
                <BaseDefiButton title="Les bonnes réponses gagnent" type="thumbsUp" @click="gagne()"></BaseDefiButton>
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

<style></style>
