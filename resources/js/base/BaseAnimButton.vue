<script setup>
import { defineProps, ref } from "vue";
import { getImagePath } from "../utils/getImagePath";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },
    selected: {
        type: Boolean,
        required: false,
    },
    link: {
        type: String,
        required: true,
    },
});

const Isselected = ref(props.selected);
const toggleSelect = () => {
    Isselected.value = !Isselected.value;
    // emit('update:selected', props.selected)
};
</script>
<template>
    <a :href="props.link">
        <div class="baseAnimButton-container" @click="toggleSelect()">
            <img :src="getImagePath(type)" class="baseAnimButton-img" />
            <h1 class="baseAnimButton-title">{{ title }}</h1>
        </div>
    </a>
</template>

<!-- css : baseAnimButton.css -->
