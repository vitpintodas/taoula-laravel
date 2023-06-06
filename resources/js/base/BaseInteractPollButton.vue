<script setup>

const props = defineProps({
    title: {
        type: String,
        default: 'default'
    },
    selected: {
        type: Boolean,
        default: false
    },
  })
</script>

<template>
 <div class="baseInteractPollButton-container" :class="{interactPollButtonSelected: props.selected}">
    <p class="textes baseInteractPollButton-textes">{{ title }}</p>
 </div>
</template>

<!-- css : BaseInteractPollButton.css -->