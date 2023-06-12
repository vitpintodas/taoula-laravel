<script setup>
import { ref } from "vue";
import BaseInput from "../base/BaseInput.vue";
import BaseTextArea from "../base/BaseTextArea.vue"
import BaseButton from "../base/BaseButton.vue";
import { getImagePath } from "../utils/getImagePath";

const message = ref({
    nom: '',
    prenom: '',
    message: '',
    fichier: {name: 'Ajouter un fichier'}
})

const errorMessage = ref('')


const updateMessage = (val, type) => {
    if(type == 'nom'){
        message.value.nom = val
    } else if (type == 'prenom'){
        message.value.prenom = val
    } else if (type == 'message'){
        message.value.message = val
    }
}

const sendMessage = () => {
    //check if the message is empty
    if(message.value.nom == '' || message.value.prenom == '' || message.value.message == ''){
        errorMessage.value = 'Tu as oublié de remplir certains champs !'
    } else {
        console.log("c'est envoyé")
    }
}

//drop du fichier : 

const onFilePicked = (event) => {
  const file = event.target.files[0];
  if (file) {
    message.value.fichier = file;
  }
};

const onPickFile = () => {
  const fileInput = document.querySelector('.messageCouleur3-dropInput');
  fileInput.click();
};

</script>
<template>
    <div class="messageCouleur3-container">
    <h1 class="titre">Envoyer un message à Couleur 3</h1>
    <div class="messageCouleur3-errorMessage" v-if="errorMessage != ''">
        <img class="baseInput-icon" :src="getImagePath('warning')" >
        <p class="titre2 messageCouleur3-errorText">{{ errorMessage }}</p>
    </div>
    <BaseInput placeholder="Saisis ton Nom" label="Nom*" @emit-input="updateMessage($event, 'nom')"/>
    <BaseInput placeholder="Saisis ton Prénom" label="Prénom*" @emit-input="updateMessage($event, 'prenom')"/>
    <BaseTextArea label="Message*" placeholder="Saisis ton message*" @emit-text-area="updateMessage($event, 'message')"/>
    <input type="file" class="messageCouleur3-dropInput" @change="onFilePicked"/>
    
    <div class='messageCouleur3-dropFileContainer'>
        <label class="baseInput-label">Envoyer un fichier</label>
        <div class="messageCouleur3-dropFile" @click="onPickFile">
            <img class="baseInput-icon" :src="getImagePath('addFile')" >
            <p class="textes messageCouleur3-fileName">{{ message.fichier.name }}</p>
        </div>
    </div>

    <BaseButton link="#home" class="messageCouleur3-button" title="Envoyer" size="large" @click="sendMessage()"/>

    </div>
</template>

<style scoped>
.messageCouleur3-container{
    margin-top: calc(var(--marginT) - 10px);
}
</style>