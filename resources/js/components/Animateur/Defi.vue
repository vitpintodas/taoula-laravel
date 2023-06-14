<script setup>
import { ref, onMounted } from "vue";
import BaseDefiButton from "../../base/BaseDefiButton.vue";
import BaseInput from "../../base/BaseInput.vue";
import BaseDurationInput from "../../base/BaseAnimateur/BaseDurationInput.vue";
import BaseButton from "../../base/BaseButton.vue"
import BaseMultipleInput from "../../base/BaseAnimateur/BaseMultipleInput.vue";

const defiRapidite = ref(false);
const defiTirage = ref(false);
const defiSelection = ref(false);
const defiMain = ref(false);

const rapidite = () => {
    defiRapidite.value = true;
    defiTirage.value = false;
    defiSelection.value = false;
    defiMain.value = false;
    updateActiveState("rapidite");
};

const tirage = () => {
    defiRapidite.value = false;
    defiTirage.value = true;
    defiSelection.value = false;
    defiMain.value = false;
    updateActiveState("tirage");
};

const gagne = () => {
    defiRapidite.value = false;
    defiTirage.value = false;
    defiSelection.value = true;
    defiMain.value = false;
    updateActiveState("selection");
};

const main = () => {
    defiRapidite.value = false;
    defiTirage.value = false;
    defiSelection.value = false;
    defiMain.value = true;
    updateActiveState("main");
};

const updateActiveState = (activeButton) => {
    const url = new URL(window.location.href);
    url.searchParams.set("activeButton", activeButton);
    window.history.replaceState({}, "", url);
};

onMounted(() => {
    const url = new URL(window.location.href);
    const activeButton = url.searchParams.get("activeButton");
    if (activeButton) {
        switch (activeButton) {
            case "rapidite":
                rapidite();
                break;
            case "tirage":
                tirage();
                break;
            case "selection":
                gagne();
                break;
            case "main":
                main();
                break;
            default:
                break;
        }
    }
});

const defi = ref({
    title: "",
    good: "",
    choices: [],
    time: "",
});

const updateChoices = (val) => {
    defi.value.choices = val;
};

const updateTime = (timeVal) => {
    console.log("TIME !", timeVal);
    defi.value.time = timeVal;
};

const launchDefi = () => {
    if (
        defi.value.title == "" 
    ) {
        alert("Veuillez entrer un titre pour le vote");
        return;
    }
    console.log("Final", defi.value);

};

</script>

<template>
    <div class="defi-container">
        <h2>Sujet du défi</h2>
        <BaseInput
            class="defi-input"
            placeholder="Sujet du défi..."
            @emit-input="defi.title = $event"
        >
        </BaseInput>
        <h2>Type du défi</h2>
        <div class="typeDefi-container">
            <div>
                <BaseDefiButton
                    title="Rapidité"
                    type="fast"
                    :class="{ active: defiRapidite }"
                    @click="rapidite"
                ></BaseDefiButton>
                <BaseDefiButton
                    title="Tirage parmi bonne réponse"
                    type="box"
                    :class="{ active: defiTirage }"
                    @click="tirage"
                ></BaseDefiButton>
            </div>
            <div class="defi2">
                <BaseDefiButton
                    title="Gagnant sélectionné à la main"
                    type="thumbsUp"
                    :class="{ active: defiSelection }"
                    @click="gagne"
                ></BaseDefiButton>
                <BaseDefiButton
                    title="Les bonnes réponses gagnent"
                    type="thumbsUp"
                    :class="{ active: defiMain }"
                    @click="main"
                ></BaseDefiButton>
            </div>
        </div>
        <div class="affiche-defi" >
            <div v-if="defiRapidite" id="defi-rapidite">
                <h2>Bonne réponse</h2>
                <BaseInput
                    class="defi-input"
                    placeholder="Ecris ici la bonne réponse à la question"
                    @emit-input="defi.good = $event"
                >
                </BaseInput>
                <BaseDurationInput class="marginT" @emit-time="updateTime($event)"></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi" @click="launchDefi()"> </BaseButton>
            </div>
            <div v-if="defiTirage" id="defi-tirage">
                <h2>Bonne réponse</h2>
                <BaseInput
                    class="defi-input"
                    placeholder="Choix correcte"
                    @emit-input="defi.good = $event"
                ></BaseInput>
                <h2>Autres réponses</h2>
                <BaseMultipleInput
                    @emit-multiple-input="updateChoices($event)"
                />
                <BaseDurationInput class="marginT" @emit-time="updateTime($event)"></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi" @click="launchDefi()"> </BaseButton>
            </div>
            <div v-if="defiSelection" id="defi-main">
                <BaseDurationInput @emit-time="updateTime($event)"></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi" @click="launchDefi()"> </BaseButton>
            </div>
            <div v-if="defiMain" id="defi-gagne">
                <h2>Bonne réponse</h2>
                <BaseInput
                    class="defi-input"
                    placeholder="Choix correcte"
                    @emit-input="defi.good = $event"
                ></BaseInput>
                <h2>Autres réponses</h2>
                <BaseMultipleInput
                    @emit-multiple-input="updateChoices($event)"
                />
                <BaseDurationInput class="marginT" @emit-time="updateTime($event)"></BaseDurationInput>
                <BaseButton size="large" title="Lancer le défi" @click="launchDefi()" ></BaseButton>
            </div>
        </div>
    </div>
</template>

<style></style>
