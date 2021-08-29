<template>
  <common-header></common-header>
  <router-view></router-view>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "TopLayout",
});
</script>
