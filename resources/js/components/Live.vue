<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Interact from './Interact/Interact.vue';
import InteractResult from './Interact/InteractResult.vue';
import BaseAudio from '../base/BaseAudio.vue';
import BaseSmallCards from '../base/BaseSmallCards.vue';
import BaseVideo from '../base/BaseVideo.vue';

const videoOrAudio = ref('audio');

const pollFakeOption = ref([
  {
    title: 'Iggy Pop the passenger',
    selected: false,
  },
  {
    title: 'All star smash mouth',
    selected: false,
  },
  {
    title: 'The Beatles Hey Jude',
    selected: false,
  },
]);

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
  result.value = theResult;

  let total = 0;
  fakeResults.value.forEach((element) => {
    total += element.value;
  });

  fakeResults.value.forEach((element) => {
    element.value = Math.round((element.value * 100) / total);
  });
};

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

  const interval = setInterval(getShowName, 10000);

  onUnmounted(() => clearInterval(interval));
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
          v-if="result === null"
          title="Vote pour la prochaine musique"
          :options="pollFakeOption"
          @emit-poll="getResult($event)"
          type="textInput"
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
  