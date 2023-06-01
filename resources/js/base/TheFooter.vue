<script setup>
import { defineProps, ref, onMounted } from "vue";

defineProps({
    types: {
        type: Array,
        required: true,
    },
    links: {
        type: Array,
        required: true,
    },
    names: {
        type: Array,
        required: true,
    },
});

const activeLinkIndex = ref(null);

onMounted(() => {
    // Récupérer l'index du lien actif depuis le stockage local du navigateur
    const storedIndex = localStorage.getItem("activeLinkIndex");
    if (storedIndex !== null) {
        activeLinkIndex.value = parseInt(storedIndex);
    }
});

const getImagePath = (type) => {
    return `${import.meta.url.split("resources")[0]}resources/assets/svg/${type}.svg`;
};

const changeColor = (index) => {
    activeLinkIndex.value = index;
    // Enregistrer l'index du lien actif dans le stockage local du navigateur
    localStorage.setItem("activeLinkIndex", index.toString());
};

const getStyle = (index) => {
    if (activeLinkIndex.value === index) {
        return {
            filter: "invert(54%) sepia(55%) saturate(2135%) hue-rotate(286deg) brightness(97%) contrast(94%)",
        };
    }
    return {};
};
</script>

<template>
    <nav>
        <ul>
            <li v-for="(type, index) in types" :key="index">
                <a :href="links[index]" @click="changeColor(index)" :style="getStyle(index)">
                    <img :src="getImagePath(type)" />
                    <p>{{ names[index] }}</p>
                </a>
            </li>
        </ul>
    </nav>
</template>

<style>

</style>
