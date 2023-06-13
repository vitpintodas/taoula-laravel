<script setup>
import { ref, watch } from "vue";
import BaseInput from "../../base/BaseInput.vue";
import BaseLabel from "../../base/BaseLabel.vue";
import BaseButton from "../../base/BaseButton.vue";
// import BasePopUp from '../../base/BaseAnimateur/BasePopUp.vue';

const interests = ref([
    {
        name: "Musique",
        selected: false,
    },
    {
        name: "Rock",
        selected: false,
    },
    {
        name: "Actualités",
        selected: false,
    },
    {
        name: "Rap",
        selected: false,
    },
    {
        name: "Humour",
        selected: false,
    },
    {
        name: "Pop",
        selected: false,
    },
    {
        name: "Classique",
        selected: false,
    },
    {
        name: "Jazz",
        selected: false,
    },
    {
        name: "Country",
        selected: false,
    },
    {
        name: "Electronique",
        selected: false,
    },
    {
        name: "Hip-hop",
        selected: false,
    },
    {
        name: "Reggae",
        selected: false,
    },
    {
        name: "Dance",
        selected: false,
    },
    {
        name: "Soul",
        selected: false,
    },
    {
        name: "R&B",
        selected: false,
    },
    {
        name: "Gospel",
        selected: false,
    },
    {
        name: "Humour",
        selected: false,
    },
    {
        name: "Actualité",
        selected: false,
    },
    {
        name: "Politique",
        selected: false,
    },
    {
        name: "Sport",
        selected: false,
    },
    {
        name: "Technologie",
        selected: false,
    },
    {
        name: "Science",
        selected: false,
    },
    {
        name: "Cinéma",
        selected: false,
    },
    {
        name: "Télévision",
        selected: false,
    },
    {
        name: "Art",
        selected: false,
    },
    {
        name: "Mode",
        selected: false,
    },
    {
        name: "Histoire",
        selected: false,
    },
    {
        name: "Cuisine",
        selected: false,
    },
    {
        name: "Voyages",
        selected: false,
    },
    {
        name: "Technologie",
        selected: false,
    },
    {
        name: "Environnement",
        selected: false,
    },
]);

const filtre = ref("");

const selectedInterests = ref([]);

const addInterest = (interest) => {
    //push interest if not already in array
    interest.selected = !interest.selected;
    if (!selectedInterests.value.includes(interest)) {
        //push the name into the selectedInterests array
        selectedInterests.value.push(interest);
        filtre.value = "";
    } else {
        //remove the interest from  selectedInterests array
        selectedInterests.value.splice(
            selectedInterests.value.indexOf(interest),
            1
        );
    }

    console.log("selectedInterests", selectedInterests.value);
};

watch(filtre, (val) => {
    console.log("filtre", val);
    interests.value.forEach((interest) => {
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
    <BaseInput placeholder="Titre du live" />
    <h1 class="titre2">Description du live</h1>
    <BaseInput
        :value="filtre"
        type="searchInput"
        placeholder=" Rechercher..."
        @emit-input="updateFiltre($event)"
    />

    <p class="titre2" v-if="selectedInterests.length > 0">Sélectionnés</p>
    <div
        class="interest-interestsSelectedDiv"
        v-if="selectedInterests.length > 0"
    >
        <BaseLabel
            v-for="interest in selectedInterests"
            :key="interest"
            :title="interest.name"
            @click="addInterest(interest)"
            class="selected"
        />
    </div>
    <p class="titre2">Autres thèmes</p>
    <br />
    <p class="sub-title textes">Audio</p>
    <div class="interest-interestsDiv">
        <BaseLabel
            v-for="interest in interests"
            :key="interest"
            :class="{ interestSelected: interest.selected }"
            :title="interest.name"
            @click="addInterest(interest)"
        />
    </div>
    <br />
    <p class="sub-title textes">Podcast</p>
    <div class="interest-interestsDiv">
        <BaseLabel
            v-for="interest in interests"
            :key="interest"
            :class="{ interestSelected: interest.selected }"
            :title="interest.name"
            @click="addInterest(interest)"
        />
    </div>

    <br />

    <!-- <BasePopUp ref="popupRef" title="Choix enregistrés" message="Vos choix ont bien été sauvegardés pour ce live" /> -->
    <BaseButton
        class="info-button"
        title="Envoyer"
        size="large"
        link="#liveInfo"
    />
</template>

<style scoped>
@media screen and (max-width: 1206px){
    a.info-button {
    float: left;
    margin-left: calc(30% + 50px);
    width: 450px;
}
}

.interest-interestsDiv {
    display: flex;
    flex-wrap: wrap;
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
