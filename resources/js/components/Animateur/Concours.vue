<script setup>
import { ref } from 'vue';
import BaseButton from '../../base/BaseButton.vue';
import BaseTextArea from '../../base/BaseTextArea.vue';
import BaseInput from '../../base/BaseInput.vue';

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { getImagePath } from '../../utils/getImagePath';

const contest = ref({
    title: '',
    description: '',
    type: '',
    dateAndTimeDeadline: '',
})
const date = ref('')
const answearType = ref('texte')
const errorMessage = ref('')

const launchContest = () => {
    contest.value.type = answearType
    contest.value.dateAndTimeDeadline = date
    if(contest.value.title == '' || contest.value.description == '' || contest.value.date == null){
        console.log(contest)
        errorMessage.value = 'Il faut remplir tous les champs du formulaire pour créer un concours !'
    } else {
        console.log('tout', contest.value)
        console.log('deadline', contest.value.dateAndTimeDeadline, 'deadline')
        console.log('type', contest.value.type)
    }
}

const updateContestData = (val, type) => {
    if(type == 'title'){
        contest.value.title = val
    } else if(type == 'description'){
        contest.value.description = val
        console.log(contest.value.description)
    }
}
</script>


<template>
    <div class="concours-errorContainer" v-if="errorMessage != ''">
        <img class="baseInput-icon" :src="getImagePath('warning')" >
        <p class="titre2 concours-errorText">{{ errorMessage }}</p>
    </div>
    <p class="titre2">Titre</p>
    <BaseInput placeholder="Saississez le titre du concours" @emit-input="updateContestData($event, 'title')" class="concours-basInput"/>
    <p class="titre2">Description</p>
    <BaseTextArea placeholder="Saisissez la description du concours" @emit-text-area="updateContestData($event, 'description')" class="concours-basInput"/>
    <p class="titre2">Type de réponses attendue</p>
    
    <div class="concours-radioContainer">
        <div>
        <input type="radio" id="texte" value="text" v-model="answearType" checked class="concours-radioInput">
        <label for="texte" class="textes">Texte</label>
        </div>
        <div>
        <input type="radio" id="photo" value="photo" v-model="answearType" class="concours-radioInput">
        <label for="photo" class="textes">Photo</label>
        </div>
        <div>
        <input type="radio" id="video" value="video" v-model="answearType" class="concours-radioInput">
        <label for="video" class="textes">Video</label>
        </div>
        <div>
        <input type="radio" id="audio" value="audio" v-model="answearType" class="concours-radioInput">
        <label for="audio" class="textes">Audio</label>
    </div>

    </div>

    <p class="titre2">Date et heure concours</p>
    <!-- <input type="date" id="start" name="trip-start" :value="today()" > -->
    <VueDatePicker class="VueDatePicker" v-model="date" placeholder="Saisissez la date et l'heure limite du concours" text-input />
    <BaseButton class="BaseButtonConcours" title="Lancer le concours" size="huge" @click="launchContest()" value="00:00"/>

</template>

<style scoped>
.VueDatePicker{
    width: 45%;
    margin-top: 5px;
   margin-left: calc(30% + 50px);
   

}
.dp__theme_light{
    --dp-background-color: var(--secondBlack);
    --dp-text-color: var(--white);
    --dp-border-color: none;
    --dp-font-family: var(--text);
    --dp-font-size: var( --textSize);
}

</style>