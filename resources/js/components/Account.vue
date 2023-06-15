<script setup>
import BaseSettingsButton from "../base/BaseSettingsButton.vue";
import { getImagePath } from "../utils/getImagePath";

// code non fonctionnel pour check si l'utilisateur est connecté
import { ref, onMounted } from "vue";
import axios from "axios";

const logout = () => {
    // Effectuer une requête HTTP POST pour la déconnexion
    axios
        .post("/logout")
        .then(() => {
            // Traiter la réponse ou rediriger l'utilisateur après la déconnexion
            // par exemple, vous pouvez rediriger l'utilisateur vers la page de connexion :
            window.location.href = "#home";
        })
        .catch((error) => {
            // Gérer les erreurs éventuelles
            console.error(error);
        });
};

const user = ref();
onMounted(async () => {
    const data = await axios.get("/api/user");
    console.log(data);
});

const shareApp = () => {
    if (navigator.share) {
        // Appelle la fonction share() de l'API Web Share avec les détails de partage
        navigator
            .share({
                title: "Couleur 3 - Interact",
                text: "Couleur 3 - Interact te permettera de profiter encore plus de ta radio en int\u00e9ragissant avec tes animateurs pr\u00e9f\u00e9r\u00e9s!",
                url: "https://taoula-pingouin.heig-vd.ch/#home", // L'URL de ton application
            })
            .then(() => {
                console.log("Partage réussi !");
            })
            .catch((error) => {
                console.log("Erreur lors du partage :", error);
            });
    } else {
        console.log(
            "L'API Web Share n'est pas prise en charge par ce navigateur."
        );
    }
};
</script>

<template>
    <div id="compte" class="marginLR">
        <p class="titre">Laura</p>
        <a href="#profilSettings">
            <img :src="getImagePath('settings')" alt="profilSettings" />
        </a>

        <p class="textes">Laura@gmail.com</p>
    </div>
    <div id="fonctionnalite">
        <p class="small-description marginLR">Fonctionnalités</p>
        <BaseSettingsButton title="Rewind" type="rewind" link="#rewind" />
        <BaseSettingsButton title="Récompenses" type="gift" link="#gifts" />
        <BaseSettingsButton title="Audio" type="music" link="#music" />
    </div>
    <div id="reglage" class="marginT">
        <p class="small-description marginLR">Réglages</p>
        <BaseSettingsButton
            title="Notifications"
            type="notification"
            link="#notification"
        />
        <BaseSettingsButton title="Apparence" type="moon" link="#appearance" />
    </div>
    <div id="aPropos" class="marginT">
        <p class="small-description marginLR">À propos</p>
        <BaseSettingsButton
            title="Envoyer un message à C3"
            type="message"
            link="#message"
        />
        <BaseSettingsButton
            id="bouton-partage"
            title="Partager l'application"
            type="share"
            @click="shareApp"
        />
        <BaseSettingsButton title="Aide" type="help" link="#help" />
        <BaseSettingsButton title="À propos" type="about" link="#about" />
    </div>
    <div id="login">
        <div id="connexion">
            <a href="../login">Connexion</a>
        </div>
        <div id="deconnexion">
            <form @submit.prevent="logout" class="form-inline">
                <button type="submit">Déconnexion</button>
            </form>
        </div>
        <p class="small-description versionApp">Version 1.0</p>
    </div>
    
</template>

<style scoped>
.marginT {
    margin-top: calc(var(--marginT) - 10px);
}
#compte {
    margin-top: var(--marginT);
    margin-bottom: var(--marginB);
}
#compte .titre {
    float: left;
}
#compte .textes {
    float: left;
    width: 100%;
}

#compte img {
    float: right;
    margin-top: 6px;
}

#fonctionnalite,
#reglage,
#aPropos {
    float: left;
    width: 100%;
}

#bouton-partage:hover {
    cursor: pointer;
}

#fonctionnalite {
    margin-top: 25px;
}
#connexion {
    margin-top: calc(var(--marginT) + 12px);
    width: calc(50% - 5px);
    max-width: 220px;
    margin-bottom: 10px;
    border-radius: 10px;
    background-color: var(--pink);
    text-align: center;
    align-items: center;
    float: left;
}
#connexion a {
    width: 100%;
    line-height: 55px;
    display: block;
    font-family: var(--title2);
    font-weight: var(--title2Width);
    font-size: var(--title2Size);
    color: var(--white);
    border-radius: 10px;
}
#login{
    float: left;
    max-width: 450px;
    width: calc(100% - 20px);
    margin-left: 10px;
}

#deconnexion button {
    margin-top: calc(var(--marginT) + 12px);
    width: calc(50% - 5px);
    max-width: 220px;
    margin-bottom: 10px;
    height: 55px;
    border-radius: 10px;
    background-color: var(--secondBlack);
    border: none;
    font-family: var(--title2);
    font-weight: var(--title2Width);
    font-size: var(--title2Size);
    color: var(--white);
    margin-left: 10px;
}
#deconnexion button:hover {
    cursor: pointer;
}
.versionApp {
    margin-right: 10px;
    float: left;
}
</style>
