<script setup>
import { defineProps } from 'vue';
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
})

const emits = defineEmits(['emitTextArea'])
const changeValue = (event) => {
    emits('emitTextArea', event.target.value)
}
</script>
<template>
    <div class="baseTextArea-container">
        <label class="baseInput-label" v-if="label">{{ label }}</label>
    <br>
    <textarea class="baseTextArea-textArea" @input="changeValue($event)" :placeholder="placeholder"></textarea>
    </div>
</template>

<!-- css: baseTextArea.css -->

