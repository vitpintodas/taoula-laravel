<script setup>
  import { defineProps, ref} from 'vue'
  import { getImagePath } from '../utils/getImagePath';

  const props = defineProps({
    title: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: true
    },
    likeStatus: {
      type: Boolean,
      required: true
    },
    link: {
      type: String,
      required: false
    }
  })

  const isLiked = ref(props.likeStatus)

  //coupe les titres trop long
  const cutTitle = (title) => {
    if (title.length > 20) {
      return title.substring(0, 20) + '...'
    }
    return title
  }

  const toggleLiked = () => {
    isLiked.value = !isLiked.value
  }

</script>
<template>
    <a :href="link">
        <div class="smallCard-container">
            <div class="smallCard-type">
                <img :src="getImagePath(type)"/>
            </div>
            <div class="smallCard-textAndLike">
                <h2 class="smallCard-textContainer">{{ cutTitle(title) }}</h2>
                <img v-if="isLiked" :src="getImagePath('liked')" @click="toggleLiked()"/>
                <img v-if="!isLiked" :src="getImagePath('unliked')" @click="toggleLiked()"/>
            </div>
        </div>
    </a>
</template>

<!-- css : baseSmallCard.css -->