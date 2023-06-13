<script setup>
import { defineProps, ref } from 'vue'

const props = defineProps({
    value1: {
        type: Number,
        required: true
    },
    value2: {
        type: Number,
        required: true
    },
    value3: {
        type: Number,
        required: true
    },

    placeholder: {
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
    <div class="durationInput-container">
        <h2>Durée d’affichage hh : min : sec</h2>
        <div class="durationInput-time">
            <input :value="value1" :placeholder="placeholder" @input="changeValue($event)">
            <p>:</p>
            <input :value="value2" :placeholder="placeholder" @input="changeValue($event)">
            <p>:</p>
            <input :value="value3" :placeholder="placeholder" @input="changeValue($event)">
        </div>
    </div>
</template>


<style></style>