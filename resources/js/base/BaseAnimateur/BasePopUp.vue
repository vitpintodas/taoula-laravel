<script setup>


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

const closePopup = () => {
    emit('update:selected', props.selected)
};

</script>

<template>
    <div class="popup">
      <div class="popup-content">
        <h2>{{ title }}</h2>
        <p>{{ message }}</p>
        <button @click="closePopup">Fermer</button>
      </div>
    </div>
  </template>
  

  
  <style scoped>

  </style>