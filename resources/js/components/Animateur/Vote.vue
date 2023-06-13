<script setup>
import { ref } from 'vue';
import BaseButton from '../../base/BaseButton.vue';
import BaseInput from '../../base/BaseInput.vue';
import BaseMultipleInput from '../../base/BaseAnimateur/BaseMultipleInput.vue';
import BaseDurationInput from '../../base/BaseAnimateur/BaseDurationInput.vue';

const vote = ref({
    title: '',
    choices: [],
    time: '',
});

const updateChoices = (val) => {
    vote.value.choices = val;
}

const updateTime = (timeVal) => {
    console.log('TIME !', timeVal);
    vote.value.time = timeVal;
}

const launchVote = () => {
    if(vote.value.title == '' || vote.value.choices.length < 2 || vote.value.time == ''){
        alert('Veuillez entrer un titre pour le vote');
        return;
    }
    console.log('Final', vote.value);

}
</script>


<template>
    <h1 class="titre2">Sujet du vote</h1>
    <BaseInput placeholder="Sujet du vote" @emit-input="vote.title = $event"/>
    <h1 class="titre2">Choix possibles</h1>

    <BaseMultipleInput @emit-multiple-input="updateChoices($event)"/>

    <BaseDurationInput @emit-time="updateTime($event)"/>

    <BaseButton class="vote-button" title="Lancer le vote" size="large"  @click="launchVote()"/>

</template>


<style scoped>
@media screen and (max-width: 1206px){
    a.vote-button {
    float: left;
    margin-left: calc(30% + 50px);
    width: 450px;
}
}

</style>