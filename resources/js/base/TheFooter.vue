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
    const storedIndex = sessionStorage.getItem("activeLinkIndex");
    if (storedIndex !== null) {
      activeLinkIndex.value = parseInt(storedIndex);
    } else {
      // Si aucun index n'est stocké, on initialise à null
      activeLinkIndex.value = null;
    }
  });
  
  const changeColor = (index) => {
    activeLinkIndex.value = index;
    sessionStorage.setItem("activeLinkIndex", index.toString());
  };
  
  const getLinkClass = (index) => {
    return {
      active: activeLinkIndex.value === index && activeLinkIndex.value === getLastClickedLinkIndex(),
    };
  };
  
  const getLastClickedLinkIndex = () => {
    const storedIndex = sessionStorage.getItem("lastClickedLinkIndex");
    if (storedIndex !== null) {
      return parseInt(storedIndex);
    }
    return null;
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
  