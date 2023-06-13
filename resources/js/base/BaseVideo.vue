<script setup>
import { getImagePath } from '../utils/getImagePath';
import { ref, onMounted } from 'vue';

const letterbox = ref(null);

const loadExternalScript = (src) => {
  return new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = src;
    script.onload = () => resolve(script);
    script.onerror = (error) => reject(error);
    document.head.appendChild(script);
  });
};

const loadExternalStylesheet = (href) => {
  const link = document.createElement('link');
  link.href = href;
  link.rel = 'stylesheet';
  document.head.appendChild(link);
};

onMounted(async () => {
  await loadExternalScript('https://letterbox-web.srgssr.ch/production/letterbox.js');
  letterbox.value = new window.SRGLetterbox({
    container: '#player_container',
  });
  letterbox.value.loadUrn('urn:rts:video:8841634');
  loadExternalStylesheet('https://letterbox-web.srgssr.ch/production/letterbox.css');
});

const emits = defineEmits(['emitVideo']);
const emitVideo = () => {
    emits('emitVideo', 'audio')
}
</script>

<template>
  <div id="player_container" class="video-video">
    <img @click="emitVideo()" :src="getImagePath('eyeOff')" class="video-micIcon" />
  </div>
</template>
<style scoped>
#player_container {
  position: relative;
}

.video-micIcon {
  z-index: 100;
  margin: 10px;
  position: absolute;
  top: 0;
  right: 0;
}
</style>
