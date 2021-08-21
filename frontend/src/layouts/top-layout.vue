<template>
  <div class="top-kv">
    <common-header></common-header>
    <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/login">Login</router-link> |
      <router-link to="/register">Register</router-link>
    </div>
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
  height: 71vh;
  background-size: cover;
}
</style>
