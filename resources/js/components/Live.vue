<script setup>
import { ref } from 'vue';
import Interact from './Interact/Interact.vue';
import InteractResult from './Interact/InteractResult.vue';

const pollFakeOption = ref([{
    title: 'Iggy Pop the passenger',
    selected: false
}, {
    title: 'All star smash mouth',
    selected: false

}, {
    title: 'The Beatles Hey Jude',
    selected: false
}])
// const multipleChoiceChallengeFakeOptions = ref([{
//     title: 'Iggy Pop the passenger',
//     selected: false,
//     correct: true
// }, {
//     title: 'All star smash mouth',
//     selected: false

// }, {
//     title: 'The Beatles Hey Jude',
//     selected: false
// }])

const fakeResults = ref([{
    title: 'Iggy Pop the passenger',
    value: 21
}, 
{
    title: 'All star smash mouth',
    value: 3

}, 
{
    title: 'The Beatles Hey Jude',
    value: 22
}]
)

const result = ref(null)

const getResult = (theResult) => {
    result.value = theResult

    console.log('resultat depuis enfant : ', result.value.type)

    //à faire si le type est un poll
    //s'occupe de calculer les pourcentages
    let total = 0;
    fakeResults.value.forEach(element => {
        total = total + element.value
    });
    //calculer les pourcentages
    fakeResults.value.forEach(element => {
        element.value = Math.round(element.value * 100 / total)
        
        console.log('percentage', element.value)
    })

    //si fastChallenge, regarder si la réponse est correct
    //ensuite regarder si l'utilisateur a saisi la bonne réponse

    //Si challenge, regarder si la réponse est correct
}

//Pour le résultat on doit pouvoir accéder à ces 3 possibilités : 
//poll : pour afficher le résultat du sondage
//challenge : l'utilisateur sera mis au courant en cas de victoire
//fastChallengeLoss : L'utilisateur a perdu un challenge de rapidité
//challengeLoss : L'utilisateur a saisi ou sélectionné la mauvaise réponse

</script>

<template>
    <!-- <iframe src="https://www.rts.ch/audio-podcast/livepopup/couleur3/" width="100%" height="166" frameborder="0" allowfullscreen></iframe> -->
    <Interact 
    v-if="result == null" 
    title="Quelle est la pire ville de Suisse" 
    :options="pollFakeOption" 
    @emit-poll="getResult($event)" 
    type="textInput"/>
    <InteractResult v-if="result" :interactType="'challengeLoss'" :results="fakeResults"/>
</template>