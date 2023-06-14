<script setup>
import BaseInput from '../../base/BaseInput.vue';
import BaseButton from '../../base/BaseButton.vue';
import BaseMultipleInput from "../../base/BaseAnimateur/BaseMultipleInput.vue";
import { ref } from "vue";

const choice = ref({
    choices: [],
});

const updateChoices = (val) => {
    choice.value.choices = val;
};



const launchChoice = () => {
    if (
        choice.value.choices.length < 2
    ) {
        alert("Veuillez entrer un titre pour le vote");
        return;
    }
    console.log("Final", choice.value);

};

</script>


<template>
    <!-- Titre de la page -->
    <h1 class="titre2">Choix possibles</h1>
    <div class="multipleChoice">

    <BaseMultipleInput @emit-multiple-input="updateChoices($event)" />
</div>
    <!-- Premier input permettant de proposer une musique 
<BaseInput placeholder="Choix numéro 1" class="concours-basInput"/>
 Deuxième input permettant de proposer une musique 
<BaseInput placeholder="Choix numéro 2" class="concours-basInput"/>
Troisième input permettant de proposer une musique 
<BaseInput placeholder="Choix numéro 3" class="concours-basInput"/> -->

    <!-- Bouton permmettant d'envoyer sur l'interface utilisateur les musiques choisies au-dessus -->
    <BaseButton title="Lancer le vote" size="large" link="#musicChoices" @click="launchChoice()" />
</template>


<style>
.multipleChoice {
    padding-bottom: 25px;
  
}
</style>