<script setup>
import { ref, watch } from "vue";
import BaseMainCards from "./base/BaseMainCards.vue";
import TheFooter from "./base/TheFooter.vue";
// import LiveSvg from './assets/vue.svg'

import BaseSettingsButton from "./base/BaseSettingsButton.vue";
import BaseSmallCards from "./base/BaseSmallCards.vue";
import TheHeader from "./base/TheHeader.vue";
import BaseLabel from "./base/BaseLabel.vue";
import Interests from "./components/Login/Interests.vue";
<<<<<<< HEAD
import Home from "./components/Home.vue";
=======
import BaseNotification from "./base/BaseNotification.vue";
>>>>>>> c6745c21d4fd1b0d93f20760200303b2fe763d63

const testNotif = ref(false)
//au bout de 12 secondes, la notification disparait
watch(testNotif, () => {
        setTimeout(() => {
            testNotif.value = false
            console.log('testNotif', testNotif)
        }, 12000)
  })

</script>

<template>
    <TheFooter
        :types="['home', 'search', 'live', 'fav', 'account']"
        :links="['#un', '#deux', '#trois', '#quatre', '#cinq']"
        :names="['Accueil', 'Recherche', 'Live', 'Favoris', 'Compte']"
    />

    <TheHeader />
    <!-- <div id="un-test" class="active"></div>
    <div id="deux-test"> 
    <BaseMainCards
        title="Smash mouth - All star"
        description="Heure musique"
        type="live"
        link="#unLien"
        info="05:20:23"
    /></div>
    <div id="trois-test"></div>
    <div id="quatre-test"></div>
    <div id="cinq-test"></div>

   
    <BaseMainCards
        title="Billets pour paléo"
        description="Tente de ganger des billets pour paléo"
        type="contest"
        link="#unlien2"
    />
    <BaseMainCards
        title="Smash mouth - All star"
        description="Heure musique"
        type="star"
        link="#unLien"
        info="05:20:23"
    />
    <BaseMainCards
        title="Smash mouth - All star"
        description="Heure musique"
        type="poll"
        link="#unLien"
        info="05:20:23"
    />

    <BaseSmallCards
        title="ACDC - All in black"
        type="music"
        :likeStatus="false"
    />
    <BaseSmallCards
        title="Mashup - Lebron James, stephen curry, tony parker"
        type="podcast"
        :likeStatus="true"
    />
    <BaseSettingsButton title="Paramètres" type="podcast" />
    <BaseLabel title="Basketball" :selected="false" />
    <BaseLabel title="Football" :selected="true" />

    <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
    <BaseSmallCards title="Mashup - Lebron James, stephen curry, tony parker" type="podcast" :likeStatus="true"/>
    <BaseSettingsButton title="Paramètres" type="podcast"/>
    <BaseLabel title="Basketball" :selected="false"/>
    <BaseLabel title="Football" :selected="true"/> -->

      <!-- <Interests /> -->
<<<<<<< HEAD
    <Home />
=======
      <BaseNotification type="brokenLike" :active="testNotif" link="#test" title="Inscris-toi" description="Inscris toi pour pouvoir liker du contenu"/>
        <button @click="testNotif = true">Test</button>
>>>>>>> c6745c21d4fd1b0d93f20760200303b2fe763d63
</template>

<style scoped></style>
