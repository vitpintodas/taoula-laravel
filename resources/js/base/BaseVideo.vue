<template>
  <div id="player_container" >
    <!-- <img @click="emitVideo()" :src="getImagePath('eyeOff')" class="video-micIcon" /> -->
  </div>
  

</template>

<script>
export default {
  async beforeMount() {
      await this.loadExternalScript(
          "https://letterbox-web.srgssr.ch/production/letterbox.js"
      );
      this.letterbox = new window.SRGLetterbox({
          container: "#player_container",
      });
      this.letterbox.loadUrn("urn:rts:video:8841634");
  },
  created() {
      this.loadExternalStylesheet(
          "https://letterbox-web.srgssr.ch/production/letterbox.css"
      );
  },
  methods: {
      loadExternalScript(src) {
          return new Promise((resolve, reject) => {
              const script = document.createElement("script");
              script.src = src;
              script.onload = () => resolve(script);
              script.onerror = (error) => reject(error);
              document.head.appendChild(script);
          });
      },
      loadExternalStylesheet(href) {
          const link = document.createElement("link");
          link.href = href;
          link.rel = "stylesheet";
          document.head.appendChild(link);
      },
  },
};
</script>

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