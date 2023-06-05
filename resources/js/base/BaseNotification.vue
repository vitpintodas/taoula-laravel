<script setup>
  import { defineProps, watch } from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  const props = defineProps({
    type: {
        type: String,
        default: 'default'
    },

    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    link: {
        type: String,
        required: false
    },
    active: {
        type: Boolean,
        default: true
    }
  })

</script>
<template>
  <a :href="link">
    <div :class="{'baseNotificationContainer': true, baseNotificationContainerActive: active}">
        <div class="baseNotification-type">
            <img :src="getImagePath(type)"/>
        </div>
          <div class="baseNotification-textContainer">
            <h2 class="titre2">{{ title }} </h2>
            <p class="description">{{ description }}</p>
          </div>
    </div>
  </a>

</template>

<!-- css : BaseNotification.css -->