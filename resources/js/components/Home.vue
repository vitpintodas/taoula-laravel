<script setup>
import BaseButton from "../base/BaseButton.vue";
import { ref, onMounted, onUnmounted } from "vue";
import BaseMainCards from "../base/BaseMainCards.vue";

const showName = ref('...');

const getShowName = async () => {
  const url =
    'https://il.srgssr.ch/integrationlayer/2.0/mediaComposition/byUrn/urn:rts:audio:3262363.json?onlyChapters=true&vector=portalplay';
  const response = await fetch(url);
  const data = await response.json();
  showName.value = data.analyticsMetadata.media_show;
}

onMounted(() => {
  getShowName();

  const interval = setInterval(getShowName, 10000);

  onUnmounted(() => clearInterval(interval));
});
</script>

<template>
    <div class="marginT">
        <BaseMainCards
            title="Billets pour paléo"
            description="Tente de ganger des billets pour paléo"
            type="contest"
            link="#participer"
        />
        <BaseMainCards
            title="Musique star du jour"
            description="Instant Crush - Daft Punk"
            type="star"
            link="/"
            info="256 likes"
        />
        <BaseMainCards
            title="Couleur 3 en direct"
            :description="showName"
            type="live"
            link="#live"
        />
    </div>
</template>
