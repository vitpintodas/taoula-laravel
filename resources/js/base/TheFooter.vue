<script setup>
import { defineProps, ref, onMounted } from "vue";
import { getImagePath } from "../utils/getImagePath";
import { changePage } from "../utils/changePage";

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
    // Récupérer l'index du lien actif depuis sessionStorage
    const storedIndex = sessionStorage.getItem("activeLinkIndex");
    if (storedIndex !== null) {
        activeLinkIndex.value = parseInt(storedIndex);
    }
});

const changeColor = (index) => {
    activeLinkIndex.value = index;
    sessionStorage.setItem("activeLinkIndex", index.toString());
};

const getStyle = (index) => {
    
    if (activeLinkIndex.value === index) {
        return {
            filter: "invert(54%) sepia(55%) saturate(2135%) hue-rotate(286deg) brightness(97%) contrast(94%)",
        };
    }
   
    return {};
};
onMounted(() => {
    changePage();
});
</script>

<template>
    <nav>
        <ul>
            <li v-for="(type, index) in types" :key="index">
                <a
                    :href="links[index]"
                    @click="changeColor(index), changePage()"
                    :style="getStyle(index)"
                >
                    <img :src="getImagePath(type)" />
                    <p>{{ names[index] }}</p>
                </a>
            </li>
        </ul>
    </nav>
</template>

<style></style>
