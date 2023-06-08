<script setup>
import BaseShopCard from "../base/BaseShopCard.vue";
import BaseMainCards from "../base/BaseShopCard.vue";
</script>

<template>
    <h1 class="titre">Comment obtenir des C3 coins ?</h1>
    <p class="textes">
        Pour obtenir des C3 coins, il faut participer à des concours, quizz et sondage Couleurs 3. Plus vous participer à des concours, quizz et sondage, plus vous gagnez des C3 coins.
    </p>
    <div class="shop-container">
        <BaseShopCard title="Stylo Couleur 3" price="100" imageLink="Stylo" />
        <BaseShopCard
            title="Stickers Couleur 3"
            price="300"
            imageLink="stickers"
        />
        <BaseShopCard
            title="Tablier Couleur 3"
            price="500"
            imageLink="tablier"
        />
        
        <BaseShopCard
            title="T-shirt Couleur 3"
            price="600"
            imageLink="t-shirt"
        />

        <BaseShopCard
            title="Visite de Couleur 3"
            price="100000"
            imageLink="studio"
        />
    </div>
</template>
<style scoped>

.titre {
    font-size: 2rem;
    margin: 1rem;
}
.textes {
    margin: 1rem;
}
.shop-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}
</style>
