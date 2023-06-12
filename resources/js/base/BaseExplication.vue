<script setup>
import { getImagePath } from '../utils/getImagePath';


const props = defineProps({
   name: {
    type: String,
    required: true,
    },
   description: {
    type: String,
    required: true,
    },
   type: {
    type: String,
    required: false,
    },
   info: {
    type: String,
    required: false,
    },
});

const toggleAnswer = (element) => {
    const answer = element.querrySelector('.description');
    const arrowIcon = element.querrySelector('.arrow-icon');
    if (answer.style.display === 'block') {
    answer.style.display = 'none';
    arrowIcon.src = getImagePath('arrow-right'); // Chemin vers l'image de la flèche pointant vers la droite
  } else {
    answer.style.display = 'block';
    arrowIcon.src = getImagePath('arrow-down'); // Chemin vers l'image de la flèche pointant vers le bas
  }
}

</script>


<template>
    <h1 class="titre">Participe au concours {{ name }}</h1>
<div class="participer">
    <h2 class="titre2">À propos du concours</h2>
    <p class="description">{{ description }}</p>
</div>
<div class="about">
    <h2 class="titre2">À propos des données</h2>
    <p class="description">Le texte ou les fichiers que tu enverras seront traités uniquement dans le cadre du concours et supprimé dirctement après que le vainqueur ait été sélectionné, alors ne t’inquiètes pas !</p>
</div>
</template>

<style scoped>

.titre2 {
    cursor: pointer;
    margin-bottom: 10px;
}

.arrow-icon {
  margin-right: 5px;
  transition: transform 0.3s;
}

.answer {
  display: none;
  margin-top: 10px;
}

.arrow-icon {
  margin-right: 5px;
  width: 16px; /* Ajustez la taille de l'image selon vos besoins */
  height: 16px;
  transition: transform 0.3s;
}

</style>