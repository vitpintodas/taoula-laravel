<script setup>
  import { defineProps, ref } from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  const props = defineProps({
    value: {
      type: String,
      required: false
    },
    placeholder: {
      type: String,
      required: true
    },
    label: {
      type: String,
      required: false
    },
    type: {
        type: String,
        required: false
    }
  })

  const emits = defineEmits(['emitInput'])
  const changeValue = (event) => {
    emits('emitInput', event.target.value)
  }

</script>
<template>
    <div class="baseInput-container">
        <label class="baseInput-label" v-if="label">{{ label }}</label>
        <div class="baseInput-inputContainer">
            <img class="baseInput-icon" v-if="type" :src="getImagePath(type)" >
            <input class="baseInput-input" :value="value" :placeholder="placeholder" @input="changeValue($event)">
        </div>
    </div>
</template>

<!-- css : baseInput.css -->