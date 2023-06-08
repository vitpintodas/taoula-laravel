<script setup>
import BaseAnimButton from "./base/BaseAnimButton.vue";

</script>


<template>
        
        <div class="container-test">
        <BaseAnimButton
            title="Créer un grand concours"
            type="contest"
            :selected="true"
            link="#concours"
        />
        <BaseAnimButton
            title="Messages des auditeurs"
            type="mail"
            :selected="false"
            link="#messages"
        />
        <BaseAnimButton
            title="Choix musical"
            type="music"
            :selected="false"
            link="#choix-musique"
        />
        <BaseAnimButton
            title="Lance un vote"
            type="piechart"
            :selected="false"
            link="#vote"
        />
        <BaseAnimButton
            title="Lance un défis"
            type="coin"
            :selected="false"
            link="#defis"
        />
        <BaseAnimButton
            title="Information du live en cours"
            type="about"
            :selected="false"
            link="#info-live"
        />
    </div>

</template>


<style></style>