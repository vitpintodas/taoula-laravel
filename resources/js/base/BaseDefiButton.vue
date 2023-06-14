<script setup>
import { defineProps, ref } from "vue";
  import { getImagePath } from '../utils/getImagePath.js';

  
  const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },

    active: {
        type: Boolean,
        required: false,
        default: false,
    },
});

const isActive = ref(false);

</script>


<template>
    <div class="baseDefiButton-container">
        <ul>
            <li>
                <a :class="{ active: isActive }">
                  <img :src="getImagePath(type)" class="baseDefiButton-type"/>
                  <h2 class="titre">{{ title }}  </h2>
                </a>
            </li>
        </ul>
    </div>
</template>



<!-- css : baseDefiButton.css -->

