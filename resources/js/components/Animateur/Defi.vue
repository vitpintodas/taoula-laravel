<script setup>
import BaseDefiButton from '../../base/BaseDefiButton.vue';
import BaseInput from '../../base/BaseInput.vue';
import { ref } from "vue";
import isActive from '../../base/BaseDefiButton.vue';
import BaseDurationInput from '../../base/BaseAnimateur/BaseDurationInput.vue';
import BaseButton from '../../base/BaseButton.vue';
import BaseMultipleInput from '../../base/BaseAnimateur/BaseMultipleInput.vue';


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

const selection = () => {
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
                <BaseDefiButton title="Rapidité" type="fast" @click="rapidite()"></BaseDefiButton>
                <BaseDefiButton title="Tirage parmi bonne réponse" type="box" @click="tirage()"></BaseDefiButton>
            </div>
            <div class="defi2">
                <BaseDefiButton title="Gagnant sélectionné à la main" type="thumbsUp" @click="main()">
                </BaseDefiButton>
                <BaseDefiButton title="Les bonnes réponses gagnent" type="thumbsUp" @click="selection()"></BaseDefiButton>
            </div>

        </div>
        <div class="affiche-defi">
            <div v-if="defiRapidite" id="defi-rapidite">
                <h2>Bonne réponse</h2>
                <BaseInput class="defi-input" placeholder="Ecris ici la bonne réponse à la question" @input="changeValue($event)">
                </BaseInput>
                <BaseDurationInput></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi"> </BaseButton>
            </div>
            <div v-if="defiTirage" id="defi-tirage">
                <h2>Bonne réponse</h2>
               <BaseInput class="defi-input" placeholder="Choix correcte" @input="changeValue($event)"></BaseInput>
               <h2>Autres réponses</h2>
                <BaseMultipleInput @emit-multiple-input="updateChoices($event)"/>
                <BaseDurationInput></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi"> </BaseButton>
            </div>
            <div v-if="defiMain" id="defi-main">
                <BaseDurationInput></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi"> </BaseButton>
            </div>
            <div v-if="defiSelection" id="defi-selection">
                <h2>Bonne réponse</h2>
               <BaseInput class="defi-input" placeholder="Choix correcte" @input="changeValue($event)"></BaseInput>
               <h2>Autres réponses</h2>
                <BaseMultipleInput @emit-multiple-input="updateChoices($event)"/>
                <BaseDurationInput></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi"> </BaseButton>
            </div>
        </div>
    </div>
</template>

<style></style>
