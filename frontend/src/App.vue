<template>
  <router-view />
</template>

<script lang="ts">
import { defineComponent, onMounted, watchEffect } from "vue";
import { RouteLocationNormalizedLoaded, useRoute } from "vue-router";

export default defineComponent({
  name: "App",
  setup() {
    /* ページタイトルの監視・変更 */
    const route = useRoute();
    onMounted(() => {
      createTitleDesc(route);
    });
    const createTitleDesc = (routeInstance: RouteLocationNormalizedLoaded) => {
      if (routeInstance.meta.title) {
        const setTitle = routeInstance.meta.title + " | FoodTruck";
        document.title = setTitle;
      } else {
        document.title = "FoodTruck";
      }
    };
    watchEffect(() => {
      createTitleDesc(route);
    });
  },
});
</script>
