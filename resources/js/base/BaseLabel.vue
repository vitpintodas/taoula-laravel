<script setup>
  import { defineProps, ref } from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  const props = defineProps({
    title: {
      type: String,
      required: true
    },
    selected: {
        type: Boolean,
        required: false
    }
  })

  const Isselected = ref(props.selected)
    const toggleSelect = () => {
        Isselected.value = !Isselected.value
        // emit('update:selected', props.selected)
    }

</script>
<template>
      <div class="baseLabel-container"  @click="toggleSelect()">
        <p class="baseLabel-text">{{ title }} </p>
    </div>
</template>

<!-- css : BaseLabel.css -->