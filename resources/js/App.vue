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
import Home from "./components/Home.vue";
import Shop from "./components/Shop.vue";
import BaseNotification from "./base/BaseNotification.vue";
import Account from "./components/Account.vue";
import BaseShopCard from "./base/BaseShopCard.vue";
import Search from "./components/Search.vue";
import BaseAnimButton from "./base/BaseAnimButton.vue";

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
    <TheHeader />

    <div class="container-test">
        <BaseAnimButton
            title="Créer un grand concours"
            type="contest"
            :selected="true"
            link="#test"
        />
        <BaseAnimButton
            title="Messages des auditeurs"
            type="mail"
            :selected="false"
            link="#test"
        />
        <BaseAnimButton
            title="Choix musical"
            type="music"
            :selected="false"
            link="#test"
        />
        <BaseAnimButton
            title="Lance un vote"
            type="piechart"
            :selected="false"
            link="#test"
        />
        <BaseAnimButton
            title="Lance un défis"
            type="coin"
            :selected="false"
            link="#test"
        />
        <BaseAnimButton
            title="Information du live en cours"
            type="about"
            :selected="false"
            link="#test"
        />
    </div>

    <TheFooter
        :types="['home', 'search', 'live', 'fav', 'account']"
        :links="['#un', '#deux', '#trois', '#quatre', '#cinq']"
        :names="['Accueil', 'Recherche', 'Live', 'Favoris', 'Compte']"
    />

    <BaseNotification
        type="brokenLike"
        :active="testNotif"
        link="#test"
        title="Inscris-toi"
        description="Inscris toi pour pouvoir liker du contenu"
    />
    <!-- <button @click="testNotif = true">Test</button> -->
</template>

<style scoped></style>
