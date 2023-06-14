<template>
    <div class="baseDefiButton-container couleurActiveButton">
      <ul>
        <li>
          <a :class="{ active: isActive }" @click="setActive">
            <img :src="getImagePath(type)" class="baseDefiButton-type" />
            <h2 class="titre">{{ title }}</h2>
          </a>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { defineProps, ref, onMounted } from "vue";
  import { getImagePath } from "../utils/getImagePath.js";
  
  const props = defineProps({
    title: {
      type: String,
      required: true,
    },
    type: {
        type: String,
        required: true,
    },

    active: {
        type: Boolean,
        required: false,
        default: false,
    },
});

const isActive = ref(false);

</script>


<template>
    <div class="baseDefiButton-container">
        <ul>
            <li>
                <a :class="{ active: isActive }">
                  <img :src="getImagePath(type)" class="baseDefiButton-type"/>
                  <h2 class="titre">{{ title }}  </h2>
                </a>
            </li>
        </ul>
    </div>
</template>


      type: String,
      required: true,
    },
  });
  
  const isActive = ref(false);
  
  const setActive = () => {
    isActive.value = true;
    const otherButtons = document.querySelectorAll(".couleurActiveButton a.active");
    otherButtons.forEach((button) => {
      button.classList.remove("active");
    });
  
    // Mettre à jour l'URL avec le paramètre d'état "actif"
    const url = new URL(window.location.href);
    url.searchParams.set("activeButton", props.type);
    window.history.replaceState({}, "", url);
  };
  
  onMounted(() => {
    // Vérifier le paramètre d'état "actif" dans l'URL lors du chargement de la page
    const url = new URL(window.location.href);
    const activeButton = url.searchParams.get("activeButton");
    if (activeButton === props.type) {
      isActive.value = true;
    }
  });
  </script>
  
  <style scoped>
  .active {
    background-color: var(--pink);
  }
  </style>
  

<!-- css : baseDefiButton.css -->
