<script setup>
import { ref } from 'vue';
import Interact from './Interact/Interact.vue';
import InteractResult from './Interact/InteractResult.vue';
import BaseAudio from '../base/BaseAudio.vue';
import BaseSmallCards from '../base/BaseSmallCards.vue';

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
const showName = ref('...')
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

//fetch from this url https://il.srgssr.ch/integrationlayer/2.0/mediaComposition/byUrn/urn:rts:audio:3262363.json?onlyChapters=true&vector=portalplay
const getShowName = async() => {
    // const response = await fetch("http://example.com/movies.json");
    // const jsonData = await response.json();
    // console.log(jsonData);
    // Make a request to fetch the HTML content
    const url = 'https://il.srgssr.ch/integrationlayer/2.0/mediaComposition/byUrn/urn:rts:audio:3262363.json?onlyChapters=true&vector=portalplay';
    const response = await fetch(url);
    const text = await response.text();
    const data = JSON.parse(text);
    console.log(data.analyticsMetadata.media_show);

    showName.value = data.analyticsMetadata.media_show
}

setInterval(() => {
    getShowName()
}, 10000);

console.log('api', getShowName())

//Pour le résultat on doit pouvoir accéder à ces 3 possibilités : 
//poll : pour afficher le résultat du sondage
//challenge : l'utilisateur sera mis au courant en cas de victoire
//fastChallengeLoss : L'utilisateur a perdu un challenge de rapidité
//challengeLoss : L'utilisateur a saisi ou sélectionné la mauvaise réponse

</script>

<template>
    <div class="live-container">

        <div>
            <BaseAudio />
            <Interact 
            v-if="result == null" 
            title="Vote pour la prochaine musique" 
            :options="pollFakeOption" 
            @emit-poll="getResult($event)" 
            type="textInput"/>
            <InteractResult v-if="result" :interactType="'text'" :results="fakeResults"/>
        </div>

        <div class="live-bottomInfoContainer">
            <p class="descriptionBold">En cours</p>
            <BaseSmallCards :title="showName" type="music" :like-status="false" />
        </div>

    </div>

</template>