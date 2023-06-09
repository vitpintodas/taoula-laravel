<script setup>
const props = defineProps({
    value: {
        type: String,
        required: true, 
    }
})

</script>


<template>
    <label></label>
    <input type="radio" id="huey"/>
    <label for="huey">{{value}}</label>
</template>


<style></style>