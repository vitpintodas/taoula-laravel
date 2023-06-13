<script setup>
import { getImagePath } from '../utils/getImagePath';
import { ref } from 'vue';


const playing = ref(true)
const currentTime = ref('LIVE')
const beautifullTime = ref('LIVE')
const timOutTime = ref(1000)

let timeoutID = null;


//get the time since the user in on the page
const d = new Date();
const firstTime = d.getTime();

const toggleAudio = () => {
var audio = document.getElementById("audio-player");

 if (audio.paused) {
  audio.play();
  playing.value = false
  updateCurrentTime()

 } else {
  audio.pause();
  playing.value = true
  // updateCurrentTime()
 }
}

const slider = () => {
    //if we slide back it goes back in the audio
    var audio = document.getElementById("audio-player");
    var seekSlider = document.getElementById("seek-slider");
    
    //use the slider to change the audio time with audioDuration instead of audio.duration
    audio.currentTime = audioDuration() * (seekSlider.value / 100)
    //change the currentTime
    currentTime.value = audio.currentTime


    if(seekSlider.value == 0){
        //put the audio at the end
        currentTime.value = '0:00'
        audio.currentTime = 0;
        // keepTime()
    } else if (seekSlider.value == 100){
        audio.currentTime = audioDuration()
        currentTime.value = 'LIVE'
    }

    updateCurrentTime()
}

const updateCurrentTime = () => {
  if (timeoutID) {
    clearTimeout(timeoutID); // Clear the existing timeout
  }

  if (currentTime.value !== 'LIVE' && !playing.value) {
    timeoutID = setTimeout(() => {
      //TODO:
      //Ici on récupère le temps sous ce format : 28.123456
      //on doit ajouter 1 seconde chaque seconde
      currentTime.value = currentTime.value + 1
      displayTime(currentTime.value)
      updateCurrentTime();
    }, timOutTime.value);
  } else if (currentTime.value === 'LIVE' && !playing.value) {
    timeoutID = setTimeout(() => {
      currentTime.value = 'LIVE';
      beautifullTime.value = 'LIVE'
      updateCurrentTime();
    }, timOutTime.value);
  }
};

//fonciton qui va s'occuper de rendre le temps joli
const displayTime = (uglyTime) => {
  //le but de cette fonction est de transformer le temps de ce format : 61.123 en ce format : 1:01
  //ou bien de ce format : 3601.123 en ce format : 1:00:01
  //ou bien de ce format 2.23 en ce fromat 0:02
  if (uglyTime > 359999) {
    beautifullTime.value = '💥'
  }

  const hours = Math.floor(uglyTime / 3600);
  const minutes = Math.floor((uglyTime % 3600) / 60);
  const seconds = Math.floor(uglyTime % 60);

  const beautifyTime = `${hours ? hours + ":" : ""}${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

  beautifullTime.value = beautifyTime
  return beautifyTime;
}


const audioDuration = () => {
    const d2 = new Date();
    const timeNow = d2.getTime()
    //difference between the first time and the time now in seconds
    const audioDuration = (timeNow - firstTime) / 1000
    return audioDuration
}

//l'emit qui va s'occuper de checker si on veut la vidéo
const emits = defineEmits(['emitVideo']);
const emitVideo = () => {
    emits('emitVideo', 'video')
}
</script>

<template>
            <audio id="audio-player" src="http://stream.srg-ssr.ch/m/couleur3/mp3_128" controls >
        Votre navigateur n'est pas capable d'afficher le live
        </audio>
    <div class="baseAudio-container">
      <div class="baseAudio-currentTimeContainer">
        <span id="current-time" class="baseAudio-time textes">{{ beautifullTime }}</span>
        <!-- <span id="current-time" class="baseAudio-time textes" v-if="currentTime != 'LIVE'">{{ currentTime }}</span> -->
        <!-- <img :src="getImagePath('onLive')" v-if="currentTime == 'LIVE'"> -->
      </div>
        <input type="range" id="seek-slider" max="100" value="100" @change="slider()">

        <img @click="emitVideo()" :src="getImagePath('live')" class="baseAudio-icon" />

        <img v-if="playing" :src="getImagePath('play')" @click="toggleAudio()" class="baseAudio-icon"/>
        <img v-if="!playing" :src="getImagePath('pause')" @click="toggleAudio()" class="baseAudio-icon"/>

    </div>
</template>