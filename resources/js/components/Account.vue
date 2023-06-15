<script setup>
import BaseSettingsButton from "../base/BaseSettingsButton.vue";
import { getImagePath } from "../utils/getImagePath";

// code non fonctionnel pour check si l'utilisateur est connecté
import { ref, onMounted } from "vue";
import axios from "axios";

const user = ref();
onMounted(async () => {
    const data = await axios.get("/api/user");
    console.log(data);
});

const shareApp = () => {
    if (navigator.share) {
    // Appelle la fonction share() de l'API Web Share avec les détails de partage
    navigator.share({
      title: 'Couleur 3 - Interact',
      text: 'Couleur 3 - Interact te permettera de profiter encore plus de ta radio en int\u00e9ragissant avec tes animateurs pr\u00e9f\u00e9r\u00e9s!',
      url: 'https://taoula-pingouin.heig-vd.ch/#home' // L'URL de ton application
    })
      .then(() => {
        console.log('Partage réussi !');
      })
      .catch((error) => {
        console.log('Erreur lors du partage :', error);
      });
  } else {
    console.log('L\'API Web Share n\'est pas prise en charge par ce navigateur.');
  }
}

</script>

<template>
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
        <BaseSettingsButton id="bouton-partage" title="Partager l'application" type="share" @click="shareApp" />
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
