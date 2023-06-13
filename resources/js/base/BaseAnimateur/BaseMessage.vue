<script setup>
import { defineProps, ref } from "vue";

const props = defineProps({
    nom: {
        type: String,
        required: true,
    },
    prenom: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        required: true,
    },
    date: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="baseMessage-container">
            <div class="textes de-container">De</div>
            <div class="textes nomPrenom-container">{{ nom }} {{ prenom }}</div>
            <div class="textes message-container">{{ message }}</div>
            <div class="textes date-container">{{ date }}</div>
    </div>
</template>

<style></style>
