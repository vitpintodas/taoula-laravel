<script setup>
import { ref, onMounted } from "vue";
import { getImagePath } from "../utils/getImagePath";

const nbCoins = 0;
const isBackPossible = ref(false);

const goBack = () => {
    window.history.back();
};

const updateBackPossible = () => {
    isBackPossible.value = window.history.length > 1;
};

onMounted(() => {
    updateBackPossible();
});

window.addEventListener("popstate", () => {
    updateBackPossible();
});

const redirectToHome = () => {
    window.location.hash = "#home";
};

</script>

<template>
    <div id="marginCachee" style="background-image: url(https://img4.tokyvideo.com/videos/474/47441/previews/previews_0000.jpg); background-repeat: repeat-x; background-size: contain;"></div>

    <header class="fixed-header">
        <div class="back-arrow">
            <a v-if="isBackPossible" @click="goBack">
                <img :src="getImagePath('arrow-back')" />
            </a>
        </div>

        <div class="c3-logo">
            <img :src="getImagePath('c3-logo')" @click="redirectToHome" />
        </div>

        <div class="right-section">
            <div class="coins">
                <img :src="getImagePath('coin')" />
                <p>{{ nbCoins }}</p>
            </div>

            <div class="shop">
                <li>
                    <a href="#gifts">
                        <img :src="getImagePath('shop')" />
                    </a>
                </li>
            </div>
        </div>
    </header>
</template>

<style scoped>
a{
    filter: brightness(100%);
  }
a.active {
    filter: invert(54%) sepia(55%) saturate(2135%) hue-rotate(286deg)
        brightness(97%) contrast(94%);
}
</style>
