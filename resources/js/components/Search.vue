<script setup>
import BaseInput from "../base/BaseInput.vue";
import BaseSmallCards from "../base/BaseSmallCards.vue";
</script>

<template>
    <BaseInput class="marginTB marginLR" :value="filtre" type="searchInput" placeholder="Rechercher..." @emit-input="updateFiltre($event)"/>
    <p class="titre2 marginLR marginT marginB">Rediffusions de la semaine</p>

    <div>
        <p class="small-description marginLR">05.06.2023</p>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
    </div>

    <div  class="marginT">
        <p class="small-description marginLR">04.06.2023</p>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
    </div>

    <div  class="marginT">
        <p class="small-description marginLR">03.06.2023</p>
        <BaseSmallCards title="ACDC - All in black" type="music" :likeStatus="false"/>
    </div>
    
</template>

<style scoped>

</style>
