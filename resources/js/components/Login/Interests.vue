<script setup>
import { ref } from 'vue';
import BaseLabel from '../../base/BaseLabel.vue';

const interests = ref([
    'Musique',
    'Rock',
    'Rap',
    'Classique',
    'Jazz',
    'Pop',
    'Electro',
    'R&B',
    'Reggae',
    'Sport',
    'Humour',
    'Actualité',
    'Cinéma',
    'Jeux vidéo',
    'Lecture',
])
const selectedInterests = ref([]);

const addInterest = (interest) => {
    //push interest if not already in array
    if (!selectedInterests.value.includes(interest)){
        selectedInterests.value.push(interest);
        //remove interest form interests array
        interests.value = interests.value.filter((item) => item !== interest);
    } else {
        selectedInterests.value = selectedInterests.value.filter((item) => item !== interest);
        interests.value.push(interest);
    }
    console.log(selectedInterests.value);
};
</script>
<template>
    <div class="interest-head">
      <h1 class="titre">Quels sont tes centres d'intérêts ?</h1>
      <p class="textes">Tu pourras modifier tes centres d'inérêts plus tard dans les paramètres</p>
    </div>

      <p class="titre2" v-if="selectedInterests.length>0">Sélectionnés</p>
        <div class="interest-interestsDiv">
            <BaseLabel v-for="interest in selectedInterests " :key="interest" :title="interest" @click="addInterest(interest)" :selected="true"/>
        </div>
      <p class="titre2">Intérêts à choisir</p>
        <div class="interest-interestsDiv">
            <BaseLabel v-for="interest in interests " :key="interest" :title="interest" @click="addInterest(interest)"/>
        </div>

    <button>ENVOYER</button>

</template>

<!-- css : interest.css -->