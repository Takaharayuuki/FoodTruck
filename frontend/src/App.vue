<template>
  <router-view />
</template>

<script lang="ts">
import {
  defineComponent,
  onMounted,
  watchEffect,
  ref,
  provide,
  reactive,
} from "vue";
import { RouteLocationNormalizedLoaded, useRoute } from "vue-router";

export default defineComponent({
  name: "App",
  setup() {
    // ログイン情報
    const isLoggedIn = ref(false);
    provide("isLoggedIn", isLoggedIn);

    // ログインしたユーザの情報
    const loginData = reactive<{ [key: string]: string }>({
      userName: "",
      userEmail: "",
      password: "",
    });
    provide("loginData", loginData);

    /* ページタイトルの監視・変更 */
    const route = useRoute();
    onMounted(() => {
      createTitleDesc(route);
    });
    const createTitleDesc = (routeInstance: RouteLocationNormalizedLoaded) => {
      if (routeInstance.meta.title) {
        const setTitle = "FoodTruck - " + routeInstance.meta.title;
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
