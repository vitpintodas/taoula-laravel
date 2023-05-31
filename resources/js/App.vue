<script setup>

import BaseMainCards from './base/BaseMainCards.vue';
import BaseSmallCards from './base/BaseSmallCards.vue';
// import LiveSvg from './assets/vue.svg'


</script>

<template>  
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="live" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Billets pour paléo" description="Tente de ganger des billets pour paléo" type="contest" link="#unlien2"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="star" link="#unLien" info="05:20:23"/>
  <BaseMainCards title="Smash mouth - All star" description="Heure musique" type="poll" link="#unLien" info="05:20:23"/>
  <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
  <BaseSmallCards title="Mashup - Lebron James, stephen curry, tony parker" type="podcast" :likeStatus="true"/>
  

</template>

<style scoped>
</style>