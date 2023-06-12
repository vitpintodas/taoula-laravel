<script setup>
import { defineProps, ref } from "vue";
import { getImagePath } from "../utils/getImagePath";
import { changePage } from "../utils/changePage";

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
    <div class="baseAnimButton-container" @click="toggleSelect()">
        <ul>
            <li>
                <a :href="props.link" @click="changePage()">
                    <img :src="getImagePath(type)" class="baseAnimButton-img" />
                    <h1 class="baseAnimButton-title">{{ title }}</h1>
                </a>
            </li>
        </ul>
    </div>
</template>

<!-- css : baseAnimButton.css -->
