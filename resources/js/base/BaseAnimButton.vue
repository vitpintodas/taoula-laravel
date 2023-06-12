<script setup>
import { defineProps, ref, onMounted } from "vue";
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
    link: {
        type: String,
        required: true,
    },
});

onMounted(() => {
    changePage();
});
</script>
<template>
    <div class="baseAnimButton-container">
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

<style scoped></style>

<!-- css : baseAnimButton.css -->
