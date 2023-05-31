<script setup>
  import { defineProps } from 'vue'

  defineProps({
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

  const cutTitle = (title) => {
    if (title.length > 20) {
      return title.substring(0, 20) + '...'
    }
    return title
  }

  const getImagePath = (type) => {
    return `${import.meta.url.split('resources')[0]}resources/assets/svg/${type}.svg`
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
                <img v-if="likeStatus" :src="getImagePath('liked')" @click="likeStatus = !likeStatus"/>
                <img v-if="!likeStatus" :src="getImagePath('unLiked')" @click="likeStatus = !likeStatus"/>
            </div>
        </div>
    </a>
</template>

<!-- css : baseSmallCard.css -->