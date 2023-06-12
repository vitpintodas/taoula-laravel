<script setup>
import BaseInput from '../../base/BaseInput.vue';
import BaseButton from '../../base/BaseButton.vue';

</script>


<template>
<!-- Titre de la page -->
<h1 class="titre2">Choix possibles</h1>

<!-- Premier input permettant de proposer une musique -->
<BaseInput placeholder="Choix numéro 1" class="concours-basInput"/>
<!-- Deuxième input permettant de proposer une musique -->
<BaseInput placeholder="Choix numéro 2" class="concours-basInput"/>
<!-- Troisième input permettant de proposer une musique -->
<BaseInput placeholder="Choix numéro 3" class="concours-basInput"/>

<!-- Bouton permmettant d'envoyer sur l'interface utilisateur les musiques choisies au-dessus -->
<BaseButton title="Lancer le vote" 
            size="large" 
            link="/"
/>

</template>


<style>

</style>