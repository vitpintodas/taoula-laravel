<script setup>
import { ref, watch } from "vue";
import TheFooter from "./base/TheFooter.vue";
// import LiveSvg from './assets/vue.svg'
import TheHeader from "./base/TheHeader.vue";
import Home from "./components/Home.vue";
import Shop from "./components/Shop.vue";
import BaseNotification from "./base/BaseNotification.vue";
import Live from "./components/Live.vue";
import Account from "./components/Account.vue";
import Search from "./components/Search.vue";
import Favorites from "./components/Favorites.vue";
import BaseAnimButton from "./base/BaseAnimButton.vue";
import Interests from "./components/Login/Interests.vue";
import MessageCouleur3 from "./components/MessageCouleur3.vue";
import Concours from "./components/Animateur/Concours.vue";
import Participer from "./components/Participer.vue";
import MusicChoice from "./components/Animateur/MusicChoice.vue";
import InformationsLive from "./components/Animateur/InformationsLive.vue";

const testNotif = ref(false);
//au bout de 12 secondes, la notification disparait
watch(testNotif, () => {
    setTimeout(() => {
        testNotif.value = false;
        console.log("testNotif", testNotif);
    }, 12000);
});
</script>

<template>
    <!-- <TheHeader /> -->
     <!-- <Interests /> -->

    <!-- <TheFooter
        :types="['home', 'search', 'live', 'fav', 'account']"
        :links="['#home', '#search', '#live', '#favorites', '#account']"
        :names="['Accueil', 'Recherche', 'Live', 'Favoris', 'Compte']"
    /> -->
        <div id="interface-animateur">
            <div id="hors-live"><p>Hors-live</p></div>
    <BaseAnimButton
        title="Créer un grand concours"
        type="contest"
        link="#bigContest"
    />

    <BaseAnimButton
        title="Message des auditeurs"
        type="mail"
        link="#messageViewers"
    />

    <div id="en-live"><p>Live</p></div>
    <BaseAnimButton
        title="Choix musical"
        type="music"
        link="#musicChoices"
    />

    <BaseAnimButton
        title="Lancer un vote"
        type="pieChart"
        link="#voteStart"
    />

    <BaseAnimButton
        title="Lancer un défi"
        type="coin"
        link="#challengeStart"
    />

    <BaseAnimButton
        title="Informations du live en cours"
        type="about"
        link="#liveInfo"
    />
        </div>
    

   <div id="home-section"><Home /></div>
    <div id="search-section"><Search /></div>
    <div id="live-section"><Live/></div>
    <div id="favorites-section"><Favorites /></div>
    <div id="account-section"><Account /></div>
    <div id="gifts-section"><Shop /></div>
    <div id="message-section"><MessageCouleur3 /></div>
    <div id="participer-section"><Participer /></div>

    <!-- Animateur -->
    <div id="bigContest-section"><Concours /></div>
    <div id="messageViewers-section">Test</div>
    <div id="musicChoices-section"><MusicChoice /></div>
    <div id="voteStart-section">Test</div>
    <div id="challengeStart-section">Test</div>
    <div id="liveInfo-section"><InformationsLive /></div>
    
    <!-- 
    <BaseMainCards
        title="Smash mouth - All star"
        description="Heure musique"
        type="live"
        link="#unLien"
        info="05:20:23"
    />
    
    

   
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
    <BaseLabel title="Basketball" :selected="false"/>
    <BaseLabel title="Football" :selected="true"/> -->

      <!-- <Interests /> -->
    <!-- <Home />
      <BaseNotification type="brokenLike" :active="testNotif" link="#test" title="Inscris-toi" description="Inscris toi pour pouvoir liker du contenu"/>
        <button @click="testNotif = true">Test</button> -->

    <!-- <Live />     -->
    <!-- <Interests /> -->
    <!-- <BaseNotification
        type="brokenLike"
        :active="testNotif"
        link="#test"
        title="Inscris-toi"
        description="Inscris toi pour pouvoir liker du contenu"
    /> -->
    <!-- <button @click="testNotif = true">Test</button> -->
</template>

<style scoped></style>
