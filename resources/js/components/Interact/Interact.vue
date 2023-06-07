<script setup>
import { ref } from 'vue';
import BaseInteractPollButton from '../../base/BaseInteractPollButton.vue';
import BaseInput from '../../base/BaseInput.vue'

const props = defineProps({
    title: {
        type: String,
        default: 'default'
    },
    options : {
        type: Array,
        default: []
    },
    type:{
      type: String,
      required: true
    }
  })

  const answear = ref(null)

  const optionSelected = (option, type) => {
    //option ça correspond soit à l'option choisie de le choix multiple
    //soit à la valeur du textInput

    if(type == 'multipleChoice'){
      props.options.forEach((option) => {
        option.selected = false
    })
    option.selected = true
    answear.value = option
    //si l'interaction est un textInput
    } else if (type == 'textInput'){
      console.log('$event', option)
      answear.value = option
    }
  }

  const emits = defineEmits(['emitPoll'])
  const sendAnswear = () => {
    //TODO: Faudra s'occuper d'envoyer la réponse à la bd
    if(props.type == 'multipleChoice'){
      emits('emitPoll', {result: answear.value, type:'multipleChoice'})
    } else if (props.type == 'textInput'){
      emits('emitPoll', {result: answear.value, type:'textInput'})
    }
  }
</script>

<template>
 <div class="poll-InteractSection">
  <div v-if="props.type == 'multipleChoice'">
      <h1 class="titre2 poll-title">{{ title }}</h1>
      <BaseInteractPollButton
          v-for="option in props.options"
          :title="option.title"
          :selected="option.selected"
          @click="optionSelected(option, 'multipleChoice')"
      />
  </div>
  <div v-if="props.type == 'textInput'" class="poll-InteractSection">
    <h1 class="titre2 poll-title">{{ title }}</h1>
    <BaseInput 
    class="poll-textInput" 
    :color="true"
    placeholder="Saisi ta réponse..."
    @emit-input="optionSelected($event, 'textInput')"/>
  </div>
 <button v-if="answear" @click="sendAnswear()">ENVOYER</button>
</div>


</template>
<!-- poll.css -->