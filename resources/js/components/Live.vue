<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Interact from './Interact/Interact.vue';
import InteractResult from './Interact/InteractResult.vue';
import BaseAudio from '../base/BaseAudio.vue';
import BaseSmallCards from '../base/BaseSmallCards.vue';
import BaseVideo from '../base/BaseVideo.vue';
import {getSondages2} from '../utils/loadJson';

const videoOrAudio = ref('audio');

// const pollFakeOption = ref([
//   {
//     title: 'Iggy Pop the passenger',
//     selected: false,
//   },
//   {
//     title: 'All star smash mouth',
//     selected: false,
//   },
//   {
//     title: 'The Beatles Hey Jude',
//     selected: false,
//   },
// ]);

//interactData is a really important ref, it's the one that has the data of the sondage
const interactData = ref(null);

const showName = ref('...');
const cardData = ref([]);

const fakeResults = ref([
  {
    title: 'Iggy Pop the passenger',
    value: 21,
  },
  {
    title: 'All star smash mouth',
    value: 3,
  },
  {
    title: 'The Beatles Hey Jude',
    value: 22,
  },
]);

const result = ref(null);

const getResult = (theResult) => {
  console.log('getResult', theResult)
  //s'occupe de récupérer le résultat du sondage
  result.value = theResult;
  //TODO: Envoyer les résultats à la bd
  fetch('/api/reponses', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      sondageDefisConcours_id: 1,
      reponse: 'test',
    }),
  })
  .then(response => response.json())
  .then(data => console.log('Success:', data))
  .catch((error) => {
    console.error('Error:', error);
   });

  //s'occupe de mettre les résultats en pourcentage
  let total = 0;
  fakeResults.value.forEach((element) => {
    total += element.value;
  });

  fakeResults.value.forEach((element) => {
    element.value = Math.round((element.value * 100) / total);
  });
};

//s'occupe de récupérer le nom de l'émission
const getShowName = async () => {
  const url =
    'https://il.srgssr.ch/integrationlayer/2.0/mediaComposition/byUrn/urn:rts:audio:3262363.json?onlyChapters=true&vector=portalplay';
  const response = await fetch(url);
  const data = await response.json();
  showName.value = data.analyticsMetadata.media_show;

  const existingCard = cardData.value.find(card => card.type === 'music');
  if (existingCard) {
    existingCard.title = showName.value;
    existingCard.likeStatus = getCardLikeStatus(showName.value);
  } else {
    const card = {
      title: showName.value,
      type: 'music',
      likeStatus: getCardLikeStatus(showName.value),
    };
    cardData.value.push(card);
  }
};
//s'occupe de récupérer les sondages 
const listenSondage = () => {
  console.log('listen sondage', getSondages2());
  getSondages2().then((data) => {
    //get the last object of the array
    data = data[data.length - 1];
    console.log('data', data);
    
    if(data.type == 'challengePoll' || data.type == 'poll'){
      data.choix = data.choix.split(',').map((choix, index) => {
      return {
        title: choix.trim(),
        selected: false,
      }
    })
    }
    console.log('data', data);
    interactData.value = data;
  }).then(() => {
    console.log('INTERACT type', interactData.value.type)
    console.log('INTERACT choix', interactData.value.choix[1])

  })
}

const getCardLikeStatus = (title) => {
  const localStorageKey = `card-${title}-state`;
  const cardData = JSON.parse(localStorage.getItem(localStorageKey));
  return cardData && cardData.isLiked === true;
};

const isMusicLiked = ref(false);

const filteredCards = ref(cardData.value);

const updateFilteredCards = () => {
  filteredCards.value = cardData.value.filter((card) =>
    card.title.toLowerCase().includes(filtre.value.toLowerCase())
  );
};

const filtre = ref('');
const showTitle = ref(true);

const updateFiltre = (val) => {
  filtre.value = val;
  showTitle.value = val === '';

  updateFilteredCards();
};

onMounted(() => {
  getShowName();
  listenSondage();

  const interval = setInterval(getShowName, 10000);
  // const interval2 = setInterval(listenSondage, 5000);


  //   //🔵Adding a sondage in the database via API
  // fetch('/api/sondages', {
  //   method: 'POST',
  //   headers: {
  //     'Content-Type': 'application/json',
  //   },
  //   body: JSON.stringify({
  //     user_id: 2,
  //     titre: 'Test',
  //     type: 'challengePoll',
  //     duree: '00:00:01',
  //     date_et_heure_publication: '2021-06-01',
  //     choix: '12, 22, 32, 42',
  //     bReponse: '12',
  //   }),
  // })
  // .then(response => response.json())
  // .then(data => console.log('Success:', data))
  // .catch((error) => {
  //   console.error('Error:', error);
  //  });
  onUnmounted(() => clearInterval(interval));
  // onUnmounted(() => clearInterval(interval2));
});

const switchVideoAudio = (val) => {
  videoOrAudio.value = val;
};
</script>
<template>
    <div class="live-container">
      <div>
        <BaseVideo v-if="videoOrAudio == 'video'"  @emit-video="switchVideoAudio($event)"/>
        <BaseAudio v-if="videoOrAudio == 'audio'" @emit-video="switchVideoAudio($event)"/>
        <Interact
          v-if="result === null && interactData !== null"
          :title="interactData.titre"
          :options="interactData.choix"
          @emit-poll="getResult($event)"
          :type="interactData.type"
        />
        <InteractResult
          v-if="result"
          :interactType="'text'"
          :results="fakeResults"
        />
      </div>
  
      <div class="live-bottomInfoContainer">
        <p class="descriptionBold">En cours</p>
        <BaseSmallCards
          v-for="card in filteredCards"
          :key="card.title"
          :title="card.title"
          :type="card.type"
          :likeStatus="card.likeStatus"
        />
      </div>
    </div>
  </template>
  
  <style scoped>
  .live-bottomInfoContainer{
    padding-bottom: 11px;
  }
  </style>
  