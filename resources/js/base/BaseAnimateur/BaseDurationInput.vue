<script setup>
import { ref } from 'vue'

const time = ref({
    hours: 0,
    minutes: 0,
    seconds: 0,
})
const timeString = ref('')

const emits = defineEmits(['emitTime'])
const changeValue = (event, t) => {
    if(t == 'h'){
        time.value.hours = event.target.value
    } else if(t == 'm'){
        time.value.minutes = event.target.value
    } else if(t == 's'){
        time.value.seconds = event.target.value
    }
    
    console.log('time', time.value)
    //put the time in this format: hh:mm:ss
    timeString.value = `${time.value.hours}:${time.value.minutes}:${time.value.seconds}`
    emits('emitTime', timeString.value)
}
</script>


<template>
    <div class="durationInput-container">
        <h2>Durée d’affichage hh : min : sec</h2>
        <div class="durationInput-time">
            <input @input="changeValue($event, 'h')" type="number">
            <p>:</p>
            <input @input="changeValue($event, 'm')" type="number">
            <p>:</p>
            <input @input="changeValue($event, 's')" type="number">
        </div>
    </div>
</template>


<style></style>