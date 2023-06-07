<script setup>
  import { defineProps } from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  defineProps({
    title: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: true
    },
    link: {
      type: String,
      required: false
    }
  })

</script>
<template>
    <a :href="link">
        <div class="settingButton-container">
            <div class="settingButton-type">
                <img :src="getImagePath(type)"/>
            </div>
                <h2 class="settingButton-textContainer">{{ title }}</h2>
        </div>
    </a>
</template>

<!-- css : baseSettingsButton.css -->