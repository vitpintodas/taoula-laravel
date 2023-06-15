<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import TheFooter from "./base/TheFooter.vue";
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
import Defi from "./components/Animateur/Defi.vue";
import Message from "./components/Animateur/Message.vue";
import MusicChoice from "./components/Animateur/MusicChoice.vue";
import InformationsLive from "./components/Animateur/InformationsLive.vue";
import Vote from "./components/Animateur/Vote.vue";
import  { getArtists, getUser, getTitles, getPlaylists, getResponse, getSondages } from "./utils/loadJson";

console.log(getArtists(1));
console.log(getUser(1));
console.log(getTitles(1));
console.log(getPlaylists(1));
console.log(getResponse(1));
console.log(getSondages(1));

const currentSection = ref("");

const updateCurrentSection = () => {
    const hash = window.location.hash.substring(1);
    currentSection.value = hash;
};

const listenToHashChange = () => {
    window.addEventListener("hashchange", updateCurrentSection);
};

const removeHashChangeListener = () => {
    window.removeEventListener("hashchange", updateCurrentSection);
};

onMounted(() => {
    updateCurrentSection();
    listenToHashChange();
});

onBeforeUnmount(() => {
    removeHashChangeListener();
});

//TEST of fetch to the database via API and modify datas 
  onMounted(() => {
    console.log('mounted')
    fetch('/api/users/1', {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      prenom: 'Léo',
      nom: 'Chollet',
      // et ainsi de suite pour tous les autres champs à mettre à jour
    }),
  })
  .then(response => response.json())
  .then(data => console.log('Success:', data))
  .catch((error) => {
    console.error('Error:', error);
  });

  //Adding a user in the database via API
  fetch('/api/users', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      prenom: 'Léo',
      nom: 'Chollet',
      pseudo: 'didier124',
      email: 'didier@gmail.com',
      password: 'Test2023__$',
      role_id: 1,
      coins: 669,
      NPA: 1110,
      localite: 'Morges',
      rue: 'Rue de la gare 1',
    }),
  })
  .then(response => response.json())
  .then(data => console.log('Success:', data))
  .catch((error) => {
    console.error('Error:', error);
  });

  //Deleting a user in the database via API
  fetch('/api/users/1', {
    method: 'DELETE',
  })
  .then(response => console.log('Success:', response.status))
  .catch((error) => {
    console.error('Error:', error);
  });

})
</script>
<template>
    <!-- Utilisateur -->
    <template
        v-if="
            currentSection === 'home' ||
            currentSection === 'search' ||
            currentSection === 'live' ||
            currentSection === 'favorites' ||
            currentSection === 'account' ||
            currentSection === 'gifts' ||
            currentSection === 'message' ||
            currentSection === 'participer' ||
            currentSection === 'interests'
        "
    >
        <TheHeader />

        <!-- Le reste du code pour la section utilisateur -->

        <TheFooter
            :types="['home', 'search', 'live', 'fav', 'account']"
            :links="['#home', '#search', '#live', '#favorites', '#account']"
            :names="['Accueil', 'Recherche', 'Live', 'Favoris', 'Compte']"
        />

        <div id="home-section"><Home /></div>
        <div id="search-section"><Search /></div>
        <div id="live-section"><Live /></div>
        <div id="favorites-section"><Favorites /></div>
        <div id="account-section"><Account /></div>
        <div id="gifts-section"><Shop /></div>
        <div id="message-section"><MessageCouleur3 /></div>
        <div id="participer-section"><Participer /></div>
        <div id="interests-section"><Interests /></div>

        <BaseNotification
            type="brokenLike"
            :active="false"
            link="#test"
            title="Inscris-toi"
            description="Inscris toi pour pouvoir liker du contenu"
        />
    </template>

    <!-- Animateur -->
    <template
        v-else-if="
            currentSection === 'homeAnimateur' ||
            currentSection === 'bigContest' ||
            currentSection === 'messageViewers' ||
            currentSection === 'musicChoices' ||
            currentSection === 'voteStart' ||
            currentSection === 'challengeStart' ||
            currentSection === 'liveInfo'
        "
    >
        <div id="homeAnimateur-section"></div>
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
        <div id="bigContest-section"><Concours /></div>
        <div id="messageViewers-section"><Message /></div>
        <div id="musicChoices-section"><MusicChoice /></div>
        <div id="voteStart-section"><Vote /></div>
        <div id="challengeStart-section"><Defi /></div>
        <div id="liveInfo-section"><InformationsLive /></div>
    </template>
</template>

<style scoped>
#homeAnimateur-section {
    margin-top: 10px;
}
</style>
