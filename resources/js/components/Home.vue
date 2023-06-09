<script setup>
import BaseButton from "../base/BaseButton.vue";
import BaseMainCards from "../base/BaseMainCards.vue";
</script>

<template>
    <div class="marginT">
        <BaseMainCards 
        title="Billets pour paléo" 
        description="Tente de ganger des billets pour paléo" 
        type="contest"
        link="#unlien2" />
        
        <BaseMainCards 
        title="Musique star du jour" 
        description="Instant Crush - Daft Punk" 
        type="star" 
        link="#unlien2"
        info="256 likes" />
        
        <BaseMainCards 
        title="Couleur 3 en direct" 
        description="COOL CONTINENTAL" 
        type="live"
        link="#unlien2" />


    </div>
</template>
