<script setup>
import BaseInteractBar from '../../base/BaseInteractBar.vue';
import { getImagePath } from '../../utils/getImagePath';


const props = defineProps({
    interactType: {
        type: String,
        required: true
    },
    results: {
        type: Object,
        required: true
    },
})

console.log('props', props.type, props.results.value)

</script>

<template>
    <div class="poll-InteractSection" v-if="interactType == 'poll'">
        <h1 class="titre2">Résultats</h1>
        <BaseInteractBar v-for="result in props.results" :title="result.title" :value="result.value"/>
    </div>
    <!-- 3 variantes possibles -->
    <!-- Avertir l'utilisateur qu'il sera informé en cas de victoire -->
    <div class="interactResult-answear" v-if="interactType == 'challenge'">
        <img class="interactResult-icon" :src="getImagePath('gift')"/>
        <p class="titre2">Merci pour ta participation ! Tu seras mis au courant en cas de victoire</p>
    </div>
    <!-- Informer l'utilisateur qu'il n'a pas été le plus rapide -->
    <div class="interactResult-answear" v-if="interactType == 'fastChallengeLoss'">
        <img class="interactResult-icon" :src="getImagePath('wind')"/>
        <p class="titre2">Merci pour ta participation ! Malheureusement tu n’as pas été le plus rapide.</p>
    </div>
    <!-- Informer l'utilisateur qu'il n'a pas saisi la bonne réponse -->
    <div class="interactResult-answear" v-if="interactType == 'challengeLoss'">
        <img class="interactResult-icon" :src="getImagePath('rain')"/>
        <p class="titre2">Merci pour ta participation ! Malheureusement ce n’est pas la bonne réponse</p>
    </div>
</template>

<!-- interactResult.css -->