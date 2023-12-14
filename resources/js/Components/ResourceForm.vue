<script setup>
import axios from "axios";
import { ref } from "vue";

let title = ref("");
let description = ref("");
let link = ref("");

function createResource() {
    axios
        .post("/api/resources", {
            title: title.value,
            description: description.value,
            link: link.value,
        })
        .then((respones) => {
            console.log(response);
        });
}
</script>

<template>
    <div class="m-8">
        <input type="text" v-model="title">
        <input type="text" v-model="description">
        <input type="text" v-model="link">
        <button @click="createResource">Crear recurso</button>
    </div>
</template>