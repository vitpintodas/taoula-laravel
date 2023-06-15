<script setup>
import BaseSettingsButton from "../base/BaseSettingsButton.vue";
import { getImagePath } from "../utils/getImagePath";
</script>

<script>
import axios from "axios";

// export default {
//     data() {
//         return {
//             user: null,
//         };
//     },
//     methods: {
//         async checkUserLoggedIn() {
//             try {
//                 const reponse = await axios.get("/api/user");
//                 this.user = reponse.data;
//             } catch (error) {
//                 console.log(error);
//             }
//         },
//     },
//     created() {
//         this.checkUserLoggedIn();
//     },
// };
</script>

<template>
    <div v-if="user">
        <h1>Bonjour, je suis connecté</h1>
    </div>
    <div id="compte" class="marginLR">
        <p class="titre">Test</p>
        <a href="#profilSettings">
            <img :src="getImagePath('settings')" alt="profilSettings" />
        </a>

        <p class="textes">mail@test</p>
    </div>
    <div id="fonctionnalite">
        <p class="small-description marginLR">Fonctionnalités</p>
        <BaseSettingsButton title="Rewind" type="rewind" link="#rewind" />
        <BaseSettingsButton title="Récompenses" type="gift" link="#gifts" />
        <BaseSettingsButton title="Audio" type="music" link="#music" />
    </div>
    <div id="reglage" class="marginT">
        <p class="small-description marginLR">Réglages</p>
        <BaseSettingsButton title="Notifications" type="notification" link="#notification" />
        <BaseSettingsButton title="Apparence" type="moon" link="#appearance" />
    </div>
    <div id="aPropos" class="marginT">
        <p class="small-description marginLR">À propos</p>
        <BaseSettingsButton title="Envoyer un message à C3" type="message" link="#message" />
        <BaseSettingsButton title="Partager l'application" type="share" link="#share" />
        <BaseSettingsButton title="Aide" type="help" link="#help" />
        <BaseSettingsButton title="À propos" type="about" link="#about" />
    </div>
    <div id="deconnexion">
        <BaseSettingsButton title="Déconnexion" type="logout" link="#logout" />
        <p class="small-description marginLR">Version 1.0</p>
    </div>
</template>

<style scoped>
.marginT{
    margin-top: calc(var(--marginT) - 10px);
}
#compte {
    margin-top: var(--marginT);
    margin-bottom: var(--marginB);
}
#compte .titre{
    float: left;
}
#compte .textes{
    float: left;
    width: 100%;
}

#compte img{
    float: right;
    margin-top: 6px;
}

#fonctionnalite, #reglage, #aPropos, #deconnexion {
    float: left;
    width: 100%;
}

#fonctionnalite{
margin-top: 25px;
}

#deconnexion {
    margin-top: calc(var(--marginT) + 2px);
}
</style>
