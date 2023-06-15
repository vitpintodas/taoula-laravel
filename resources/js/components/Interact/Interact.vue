<script setup>
import { ref } from 'vue';
import BaseInteractPollButton from '../../base/BaseInteractPollButton.vue';
import BaseInput from '../../base/BaseInput.vue';
import BaseButton from '../../base/BaseButton.vue';

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
    if(type == 'poll'){
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
    console.log('answear', answear.value)
    if(props.type == 'poll'){
      emits('emitPoll', {result: answear.value, type:'poll'})
    } else if (props.type == 'textInput'){
      emits('emitPoll', {result: answear.value, type:'textInput'})
    }
  }
</script>

<template>
 <div class="poll-InteractSection">
  <div v-if="props.type == 'poll'">
      <h1 class="titre2 poll-title">{{ title }}</h1>
      <BaseInteractPollButton
          v-for="option in props.options"
          :title="option.title"
          :selected="option.selected"
          @click="optionSelected(option, 'poll')"
      />
  </div>
  <div v-if="props.type == 'textInput'" class="poll-InteractSection">
    <h1 class="titre2 poll-title">{{ title }}</h1>
    <BaseInput 
    class="poll-textInput" 
    color="blackInput"
    color2="baseInput-inputContainerBlack"
    placeholder="Saisi ta réponse..."
    @emit-input="optionSelected($event, 'textInput')"/>
  </div>
 <BaseButton title="Envoyer" size="small" type="plane" v-if="answear"  @click="sendAnswear()"/>
 
</div>


</template>
<!-- poll.css -->