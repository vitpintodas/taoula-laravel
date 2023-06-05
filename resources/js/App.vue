<script setup>

import BaseMainCards from './base/BaseMainCards.vue';
import BaseSettingsButton from './base/BaseSettingsButton.vue';
import BaseSmallCards from './base/BaseSmallCards.vue';
import BaseShopCard from './base/BaseShopCard.vue';


</script>

<template>  
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="live" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Billets pour paléo" description="Tente de ganger des billets pour paléo" type="contest" link="#unlien2"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="star" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="poll" link="#unLien" info="05:20:23"/>
  <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
  <BaseSmallCards title="Mashup - Lebron James, stephen curry, tony parker" type="podcast" :likeStatus="true"/>

  <div class="test-container">
  <BaseShopCard title="Stylo Couleur 3" price="100" imageLink="Stylo"/>
  <BaseShopCard title="Tablier Couleur 3" price="500" imageLink="tablier"/>
  <BaseShopCard title="Stickers Couleur 3" price="300" imageLink="stickers"/>
  <BaseShopCard title="T-shirt Couleur 3" price="600" imageLink="t-shirt"/>
  <BaseShopCard title="Visite de Couleur 3" price="100000" imageLink="studio"/>
  </div>

  


</template>

<style scoped>
  .test-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
  }
</style>