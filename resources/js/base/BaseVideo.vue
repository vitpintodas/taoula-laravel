<template>
  <div id="player_container">
  </div>
  <img @click="emitVideo()" :src="getImagePath('eyeOff')" class="video-micIcon" />  
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
    emitVideo() {
      this.$emit("emitVideo", "audio");
    },
    getImagePath(type){
        // lien suceptible de changer en fonction de l'ordinateur ou du serveur
    // return `http://[::1]:5174/resources/assets/svg/${type}.svg`
    // return `../../../resources/assets/svg/${type}.svg`
    // console.log(import.meta.url)
    //return the path of the svg using import.meta.url
    // console.log(`${import.meta.url.split('resources')[0]}resources/assets/svg/${type}.svg`)
    // console.log(`${import.meta.url.split('resources')[0]}`)
    return `${window.location.origin}/storage/${type}.svg`;
}
  },
  emits: ['emitVideo'], // Add the emits configuration here
};
</script>
