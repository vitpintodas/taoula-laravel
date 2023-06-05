<script setup>
import BaseSettingsButton from "../base/BaseSettingsButton.vue";
</script>

<template>
    <div id="compte" class="marginTB marginLR">
        <p class="titre">test</p>
        <a href="#profilSettings">
            <img src="./../../assets/svg/settings.svg" alt="profilSettings" />
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
        <BaseSettingsButton title="Partager l'application" type="share" link="#share" />
        <BaseSettingsButton title="Aide" type="help" link="#help" />
        <BaseSettingsButton title="À propos" type="about" link="#about" />
    </div>
    <div id="deconnexion">
        <BaseSettingsButton title="Déconnexion" type="logout" link="#logout" />
        <p class="small-description marginLR">Version 1.0</p>
    </div>
</template>

<style>
#compte img {
    position: absolute;
    top: 91px;
    right: 10px;
}
#deconnexion {
    margin-top: calc(var(--marginT) + 22px);
    margin-bottom: 100px;
}
</style>
