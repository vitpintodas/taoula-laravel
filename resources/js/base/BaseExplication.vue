<script setup>

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


</script>


<template>

<!-- Titre de la page de participation à un concours -->
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


</style>