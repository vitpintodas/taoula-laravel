<script setup>
import { ref } from "vue";
import BaseButton from "../../base/BaseButton.vue";
import BaseInput from "../../base/BaseInput.vue";
import BaseMultipleInput from "../../base/BaseAnimateur/BaseMultipleInput.vue";
import BaseDurationInput from "../../base/BaseAnimateur/BaseDurationInput.vue";

const vote = ref({
    title: "",
    choices: [],
    time: "",
});

const updateChoices = (val) => {
    vote.value.choices = val;
};

const updateTime = (timeVal) => {
    console.log("TIME !", timeVal);
    vote.value.time = timeVal;
};

const launchVote = () => {
    if (vote.value.title == "" || vote.value.choices.length < 2 || vote.value.time == "") {
        alert("Veuillez entrer un titre pour le vote");
        return;
    } 
    
    console.log("Final", vote.value);
//🔵Adding a sondage in the database via API
//the vote.value.choices is an array of strings like this : [{value: "choice1"}, {value: "choice2"}, {value: "choice3"}]
//create a string like this : "choice1, choice2, choice3"
//then send it to the API   
let choices = "";
vote.value.choices.forEach((choice) => {
    choices += choice.value + ",";
});
//remove the last comma
choices = choices.slice(0, -1);

console.log('title', vote.value.title)
console.log('choices', choices)
console.log('time', vote.value.time)


 //delete le sondage en cours : 
   //
   fetch('api/sondages')
  fetch('/api/sondages', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      user_id: 2,
      titre: vote.value.title,
      type: 'poll',
      duree: vote.value.time,
      date_et_heure_publication: '2021-06-01',
      choix: choices,
      bReponse: '-',
    }),
  })
  .then(response => response.json())
  .then(data => console.log('Success:', data))
  .catch((error) => {
    console.error('Error:', error);
   });
};
</script>

<template>
    <h1 class="titre2">Sujet du vote</h1>
    <BaseInput placeholder="Sujet du vote" @emit-input="vote.title = $event" />
    <h1 class="titre2">Choix possibles</h1>

    <BaseMultipleInput @emit-multiple-input="updateChoices($event)" />

    <BaseDurationInput class="marginT" @emit-time="updateTime($event)" />

    <BaseButton
        title="Lancer le vote"
        size="large"
        @click="launchVote()"
    />
</template>

<style scoped>

.baseInput-container {
    padding-top: 0px;
    margin-top: 0px;
}

</style>
