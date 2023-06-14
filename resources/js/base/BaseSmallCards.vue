<template>
  <a :href="link">
    <div class="smallCard-container">
      <div class="smallCard-type">
        <img :src="getImagePath(type)" />
      </div>
      <div class="smallCard-textAndLike">
        <h2 class="smallCard-textContainer">{{ cutTitle(title) }}</h2>
        <img
          v-if="isLiked"
          :src="getImagePath('liked')"
          @click="toggleLiked()"
        />
        <img
          v-else
          :src="getImagePath('unLiked')"
          @click="toggleLiked()"
        />
      </div>
    </div>
  </a>
</template>

<script setup>
import { defineProps, ref, onMounted } from 'vue'
import { getImagePath } from '../utils/getImagePath'
import { getDate } from '../utils/getDate'

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  type: {
    type: String,
    required: true
  },
  link: {
    type: String,
    required: false
  },
  likeStatus: {
    type: Boolean,
    default: false
  }
})

const isLiked = ref(props.likeStatus)

const cutTitle = (title) => {
  if (title.length > 20) {
    return title.substring(0, 20) + '...'
  }
  return title
}

const toggleLiked = () => {
  isLiked.value = !isLiked.value
  updateLocalStorage()
  updateCookie()

  const cardUpdatedEvent = new CustomEvent('card-updated', {
    detail: {
      title: props.title,
      isLiked: isLiked.value
    }
  })
  window.dispatchEvent(cardUpdatedEvent)
}

const updateLocalStorage = () => {
  const cardState = {
    isLiked: isLiked.value,
    date: getDate()
  }
  localStorage.setItem(getCardLocalStorageKey(), JSON.stringify(cardState))
}

const updateCookie = () => {
  document.cookie = `${getCardCookieName()}=${
    isLiked.value ? 'liked' : 'unliked'
  }; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`
}

const getCardLocalStorageKey = () => {
  return `card-${props.title}-state`
}

const getCardCookieName = () => {
  return `card-${props.title}-likeStatus`
}

onMounted(() => {
  const storedState = localStorage.getItem(getCardLocalStorageKey())
  if (storedState) {
    const cardState = JSON.parse(storedState)
    isLiked.value = cardState.isLiked
  } else {
    const cookies = document.cookie.split(';')
    for (const cookie of cookies) {
      const [name, value] = cookie.split('=')
      if (name.trim() === getCardCookieName()) {
        isLiked.value = value.trim() === 'liked'
        break
      }
    }
  }
})

// Ajoute un gestionnaire d'événement pour écouter 'card-updated' dans le sens inverse
window.addEventListener('card-updated', (event) => {
  const { title, isLiked: updatedIsLiked } = event.detail
  if (title === props.title && isLiked.value !== updatedIsLiked) {
    isLiked.value = updatedIsLiked
    updateLocalStorage()
    updateCookie()
  }
})
</script>

<style scoped>
/* styles CSS pour le composant BaseSmallCards */
</style>
