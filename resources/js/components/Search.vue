<template>
    <div>
        <BaseInput
            class="marginTB marginLR"
            :value="filtre"
            type="searchInput"
            placeholder="Rechercher..."
            @emit-input="updateFiltre($event)"
        />
        <p class="titre2 marginLR marginT marginB" v-if="showTitle">
            Rediffusions de la semaine
        </p>

        <div
            class="marginLR marginT cardSolo"
            v-for="(cards, date) in filteredCards"
            :key="date"
        >
            <p class="small-description" v-if="showTitle && cards.length > 0">
                {{ date }}
            </p>
            <BaseSmallCards
                v-for="card in cards"
                :key="card.title"
                :title="card.title"
                :type="card.type"
                :likeStatus="card.likeStatus"
            />
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import BaseInput from "../base/BaseInput.vue";
import BaseSmallCards from "../base/BaseSmallCards.vue";
import { getArtists, getTitles } from "../utils/loadJson";

const cards = ref([]);

for (let i = 0; i < 15; i++) {
    const currentDate = getPastDate(i);
    cards.value.push({
        title: `Card ${i + 1}`,
        type: "music",
        likeStatus: false,
        date: currentDate,
    });
}

const artists = ref([]);
const titles = ref([]);

const fetchData = async () => {
    for (let index = 0; index < 15; index++) {
        const artistData = await getArtists(index + 1);
        artists.value[index] = artistData;

        const titleData = await getTitles(index + 1);
        titles.value[index] = titleData;

        cards.value[
            index
        ].title = `${artists.value[index].nom} - ${titles.value[index].nom}`;
    }

    updateFiltre(filtre.value);
};

fetchData();

const filtre = ref("");
const showTitle = ref(true);

const updateFiltre = (val) => {
    filtre.value = val;
    showTitle.value = val === "";
};

const filteredCards = ref(groupCardsByDate(cards.value, 5, 5));

watch(filtre, (val) => {
    if (val === "") {
        filteredCards.value = groupCardsByDate(cards.value, 5, 5);
    } else {
        filteredCards.value = groupCardsByDate(
            cards.value.filter((card) =>
                card.title.toLowerCase().includes(val.toLowerCase())
            ),
            Infinity,
            Infinity
        );
    }
});

// Fonction pour regrouper les cartes par date avec 1 à 2 cartes par date (ou toutes les cartes si maxCardsPerDate = Infinity)
function groupCardsByDate(cards, maxDates, maxCardsPerDate) {
    const groupedCards = {};

    const uniqueDates = [...new Set(cards.map((card) => card.date))];
    const sortedDates = uniqueDates.sort((a, b) => new Date(b) - new Date(a));

    let dateCount = 0;

    for (const date of sortedDates) {
        const dateCards = cards.filter((card) => card.date === date);
        if (dateCards.length > 0) {
            groupedCards[date] = getRandomCards(dateCards, maxCardsPerDate);
            dateCount++;
        }

        if (dateCount >= maxDates) {
            break;
        }
    }

    return groupedCards;
}

// Fonction pour obtenir 1 à 2 cartes aléatoires d'un tableau de cartes
function getRandomCards(cards, maxCards) {
    if (cards.length <= maxCards || maxCards === Infinity) {
        return cards;
    } else {
        const randomIndices = new Set();
        while (randomIndices.size < maxCards) {
            const randomIndex = Math.floor(Math.random() * cards.length);
            randomIndices.add(randomIndex);
        }
        return Array.from(randomIndices).map((index) => cards[index]);
    }
}

// Fonction pour obtenir la date d'aujourd'hui au format jj.mm.aaaa
function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    return `${day}.${month}.${year}`;
}

// Fonction pour obtenir la date passée en fonction du nombre de jours écoulés
function getPastDate(days) {
    const today = new Date();
    const pastDate = new Date(today.setDate(today.getDate() - days));
    const year = pastDate.getFullYear();
    const month = String(pastDate.getMonth() + 1).padStart(2, "0");
    const day = String(pastDate.getDate()).padStart(2, "0");
    return `${day}.${month}.${year}`;
}
</script>

<style scoped>
.titre2 {
    margin-bottom: -20px;
}

.cardSolo {
    margin-bottom: -10px;
}

.small-description {
    padding-top: 10px;
}
</style>
