<script setup>
import BaseButton from '../BaseButton.vue';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        required: true,
    },
});

const popup = document.querySelector('.popup');
const closeButton = document.querySelector('.close-button');

const closePopup = () => {
    closeButton.addEventListener('click', () => {
        popup.style.display = 'none';
    });
};

</script>

<template>
    <div class="popup">
      <div class="popup-content">
        <h2>{{ title }}</h2>
        <p>{{ message }}</p>
        <BaseButton title="OK" size="large" @click="closePopUp()"/>
      </div>
    </div>
  </template>
  
  <style scoped>


  </style>