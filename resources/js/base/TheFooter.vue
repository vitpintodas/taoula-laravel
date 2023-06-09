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
  
  const getLinkClass = (index) => {
    return {
      active: activeLinkIndex.value === index && activeLinkIndex.value === getLastClickedLinkIndex(),
    };
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
          @click="changePage()"
          :class="getLinkClass(index)"
        >
          <img :src="getImagePath(type)" />
          <p>{{ names[index] }}</p>
        </a>
      </li>
    </ul>
  </nav>
</template>
  
  <style scoped>
  </style>
  