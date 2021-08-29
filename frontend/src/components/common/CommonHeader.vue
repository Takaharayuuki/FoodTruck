<template>
  <header :class="route.path === '/' ? '' : 'bg-yellow-500'" class="relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div
        class="
          flex
          justify-between
          items-center
          border-gray-100
          py-2
          md:justify-start md:space-x-10
        "
      >
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <router-link to="/">
            <h1 class="text-4xl text-white">FoodTruck</h1>
          </router-link>
        </div>
        <pre class="text-white">{{ loginData }}</pre>
        <div class="-mr-2 -my-2 md:hidden">
          <button
            type="button"
            class="
              bg-white
              rounded-md
              p-2
              inline-flex
              items-center
              justify-center
              text-gray-400
              hover:text-gray-500 hover:bg-gray-100
              focus:outline-none
              focus:ring-2
              focus:ring-inset
              focus:ring-indigo-500
            "
            aria-expanded="false"
          >
            <span class="sr-only">Open menu</span>
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10"></nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <router-link
            to="/store_register"
            class="
              text-white
              whitespace-nowrap
              text-base
              font-medium
              hover:text-gray-900
            "
          >
            出店登録
          </router-link>
          <template v-if="!isLoggedIn">
            <router-link
              to="/login"
              class="
                text-white
                ml-8
                whitespace-nowrap
                text-base
                font-medium
                hover:text-gray-900
              "
            >
              ログイン
            </router-link>
            <router-link
              to="register"
              class="
                ml-8
                whitespace-nowrap
                inline-flex
                items-center
                justify-center
                px-4
                py-2
                border border-transparent
                rounded-md
                shadow-sm
                text-base
                font-medium
                text-white
                bg-blue-500
                hover:bg-blue-700
              "
            >
              新規登録
            </router-link>
          </template>
          <template v-else>
            <div
              to="/login"
              class="
                text-white
                ml-8
                whitespace-nowrap
                text-base
                font-medium
                hover:text-gray-900
                cursor-pointer
              "
              @click="logout"
            >
              ログアウト
            </div>
          </template>
        </div>
      </div>
    </div>
  </header>
</template>

<script lang="ts">
import { defineComponent, inject } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

export default defineComponent({
  name: "CommonHeader",
  setup() {
    const route = useRoute();
    const router = useRouter();

    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    // ログインしたユーザの情報
    const loginData: any = inject("loginData");

    function logout() {
      axios.post("api/auth/logout", {}).then((response) => {
        isLoggedIn.value = false;
        loginData.userName = "";
        loginData.userEmail = "";
        loginData.password = "";
        router.push("/login");
      });
    }

    return {
      //データ
      route,
      isLoggedIn,
      loginData,
      // 関数
      logout,
    };
  },
});
</script>
