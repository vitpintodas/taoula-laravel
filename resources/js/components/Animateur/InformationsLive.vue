<script setup>
import { ref, watch } from 'vue';
import BaseInput from '../../base/BaseInput.vue';
import BaseLabel from '../../base/BaseLabel.vue';
import BaseButton from '../../base/BaseButton.vue';

const audioInterests = ref([
    {
        name: 'Musique',
        selected: false,
    },
    {
        name: 'Rock',
        selected: false,
    },
    {
        name: 'Pop',
        selected: false,
    },
    {
        name: 'Jazz',
        selected: false,
    },
    {
        name: 'Electro',
        selected: false,
    },
    {
        name: 'Variété',
        selected: false,
    },
    {
        name: 'Mix',
        selected: false,
    },
    {
        name: 'Classique',
        selected: false,
    },
    {
        name: 'Rap',
        selected: false,
    },
    {
        name: 'RnB',
        selected: false,
    },
    {
        name: 'Reggae',
        selected: false,
    },
    {
        name: 'Soul',
        selected: false,
    },
    {
        name: 'Funk',
        selected: false,
    },
    {
        name: 'Disco',
        selected: false,
    },
    {
        name: 'Country',
        selected: false,
    },
    {
        name: 'Latino',
        selected: false,
    },
    {
        name: 'Blues',
        selected: false,
    },
    {
        name: 'Metal',
        selected: false,
    },
    {
        name: 'Folk',
        selected: false,
    },
    {
        name: 'Gospel',
        selected: false,
    },
    {
        name: 'Reggaeton',
        selected: false,
    },
    {
        name: 'K-Pop',
        selected: false,
    },
    {
        name: 'Bande originale',
        selected: false,
    },
]);

const podcastInterests = ref([
    {
        name: 'Actualités',
        selected: false,
    },
    {
        name: 'Discussion',
        selected: false,
    },
    {
        name: 'Société',
        selected: false,
    },
    {
        name: 'Culture',
        selected: false,
    },
    {
        name: 'Humour',
        selected: false,
    },
    {
        name: 'Sport',
        selected: false,
    },
    {
        name: 'Politique',
        selected: false,
    },
    {
        name: "Cinéma",
        selected: false,
    },
    {
        name: "Arts",
        selected: false,
    },
    {
        name: "Gastronomie",
        selected: false,
    },
    {
        name: 'High-tech',
        selected: false,
    },
    {
        name: 'Jeux-vidéo',
        selected: false,
    },
    {
        name: 'Voyage',
        selected: false,
    }
]);

const filtre = ref('');

const selectedInterests = ref([]);

const addInterest = (interest) => {
    // push interest if not already in array
    interest.selected = !interest.selected;
    if (!selectedInterests.value.includes(interest)) {
        // push the name into the selectedInterests array
        selectedInterests.value.push(interest);
        filtre.value = '';
    } else {
        // remove the interest from selectedInterests array
        selectedInterests.value.splice(selectedInterests.value.indexOf(interest), 1);
    }

    console.log('selectedInterests', selectedInterests.value);
};

watch(filtre, (val) => {
    console.log('filtre', val);
    audioInterests.value.forEach((interest) => {
        if (interest.name.toLowerCase().includes(val.toLowerCase())) {
            interest.selected = false;
        } else {
            interest.selected = true;
        }
    });

    podcastInterests.value.forEach((interest) => {
        if (interest.name.toLowerCase().includes(val.toLowerCase())) {
            interest.selected = false;
        } else {
            interest.selected = true;
        }
    });
});

const updateFiltre = (val) => {
    filtre.value = val;
};

</script>


<template>

<h1 class="titre2">Titre du live</h1>
<BaseInput placeholder="Titre du live"/>
<h1 class="titre2">Description du live</h1>
<BaseInput :value="filtre" type="searchInput" placeholder="Rechercher..." @emit-input="updateFiltre($event)"/>

<p class="titre2" v-if="selectedInterests.length > 0">Sélectionnés</p>
<div class="interest-interestsSelectedDiv" v-if="selectedInterests.length > 0">
    <BaseLabel v-for="interest in selectedInterests" :key="interest" :title="interest.name" @click="addInterest(interest)" class="selected"/>
</div>
<p class="titre2">Thèmes</p>
<br>
<p class="sub-title textes">Audio</p>
<div class="interest-interestsDiv">
    <BaseLabel v-for="interest in audioInterests" :key="interest" :class="{ interestSelected: interest.selected }" :title="interest.name" @click="addInterest(interest)"/>
</div>
<br>
<p class="sub-title textes">Podcast</p>
<div class="interest-interestsDiv">
    <BaseLabel v-for="interest in podcastInterests" :key="interest" :class="{ interestSelected: interest.selected }" :title="interest.name" @click="addInterest(interest)"/>
</div>
<br>

<BaseButton class="info-button" title="Envoyer" size="large" link="#liveInfo"/>

</template>


<style scoped>
.interest-interestsDiv {
    display: flex;
    flex-wrap: wrap;
    margin-left: calc(30% + 55px);
    margin-right: 0px;
}

.sub-title {
    margin-left: calc(30% + 55px);
    width: 450px;
    font-weight: bold;
}

.baseInput-container {
    margin-top: 0;
}

</style>
