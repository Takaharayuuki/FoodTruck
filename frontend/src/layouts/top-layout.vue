<template>
  <div class="top-kv">
    <common-header></common-header>
    <router-view></router-view>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "TopLayout",
});
</script>
<style scoped>
.top-kv {
  background-image: url("../assets/sample.jpg");
  width: 100%;
  height: 62vh;
  background-size: cover;
}
</style>
