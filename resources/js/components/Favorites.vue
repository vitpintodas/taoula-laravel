<template>
    <div id="favoris" class="marginTB">
      <p class="titre marginLR">Favoris</p>
      <div
        id="groupeFav"
        v-for="dateGroup in groupedLikedItems"
        :key="dateGroup.date"
      >
        <p class="small-description marginLR marginT">{{ dateGroup.date }}</p>
        <div id="cardFav" class="marginLR">
          <BaseSmallCards
            v-for="item in dateGroup.items"
            :key="item.title"
            :title="item.title"
            type="music"
            :likeStatus="true"
            @card-updated="handleCardUpdated"
          />
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import BaseSmallCards from '../base/BaseSmallCards.vue'
  import { ref, onMounted, onUnmounted } from 'vue'
  
  const groupedLikedItems = ref([])
  
  const groupLikedItems = () => {
    const items = []
  
    for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i)
  
      if (key.includes('card-')) {
        const title = key.replace('card-', '').replace('-state', '')
        const cardData = JSON.parse(localStorage.getItem(key))
  
        if (cardData && cardData.isLiked === true) {
          const isLiked = cardData.isLiked
          const date = cardData.date
  
          items.push({ title, isLiked, date })
        }
      }
    }
  
    const sortedItems = items.sort(
      (a, b) => new Date(b.date) - new Date(a.date)
    )
  
    const groups = {}
    sortedItems.forEach((item) => {
      const date = item.date
  
      if (!groups[date]) {
        groups[date] = []
      }
  
      groups[date].push(item)
    })
  
    const sortedGroups = Object.entries(groups)
      .sort((a, b) => new Date(b[0]) - new Date(a[0]))
      .map(([date, items]) => ({
        date,
        items
      }))
  
    groupedLikedItems.value = sortedGroups
  }
  
  const removeCard = (title) => {
    const localStorageKey = `card-${title}-state`
    localStorage.removeItem(localStorageKey)
    groupLikedItems()
  }
  
  const handleCardUpdated = (event) => {
    const { title, isLiked } = event.detail
  
    if (!isLiked) {
      removeCard(title)
    } else {
      groupLikedItems()
    }
  }
  
  onMounted(() => {
    groupLikedItems()
    window.addEventListener('card-updated', handleCardUpdated)
  })
  
  onUnmounted(() => {
    window.removeEventListener('card-updated', handleCardUpdated)
  })
  </script>
  
  <style scoped>
  /* styles CSS pour le composant Favorites */
  </style>
  