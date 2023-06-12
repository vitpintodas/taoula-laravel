<script setup>
  import { defineProps } from 'vue'


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
    }
    
  })

  const emits = defineEmits(['emitInput'])
  const changeValue = (event) => {
    emits('emitInput', event.target.value)
  }

</script>
<template>
    <div>
        <label class="baseAnimeInput-label" v-if="label">{{ label }}</label>
        <div>
            <input class="baseInput-input" :value="value" :placeholder="placeholder" @input="changeValue($event)">
        </div>
    </div>
</template>

<!-- css : baseAnimeInput.css -->