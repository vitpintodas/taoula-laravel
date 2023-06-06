<script setup>

const props = defineProps({
    title: {
        type: String,
        default: 'default'
    },
    value: {
        type: Number,
        default: 0,
    },
  })

  const style = () => {
    return {
        width: `${props.value}%`
    }
  }

</script>

<template>
 <div class="baseInteractBar-container">
    <p class="textes baseInteractBar-textes">{{ title }}</p>
    <p class="textes baseInteractBar-textes">{{ value }}%</p>
    <div class="baseInteractBar-pinkReslut" :style="style()"></div>
 </div>
</template>
<style>

</style>

<!-- baseInteractBar.css -->
