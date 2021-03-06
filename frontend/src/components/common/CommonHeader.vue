<template>
  <header class="bg-yellow-500 relative">
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
        <!-- ヘッダーロゴ -->
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <router-link to="/">
            <h1 class="text-4xl text-white">FoodTruck</h1>
          </router-link>
        </div>
        <!-- ./ヘッダーロゴ -->
        <!-- ヘッダーメニュー -->
        <div class="-mr-2 -my-2 md:hidden">
          <button
            @click="openMenu"
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
        <!-- ./ヘッダーメニュー -->
        <!--ハンバーガーメニューの中身-->
        <transition name="hamburger-menu">
          <div class="hamburger-menu" v-if="isOpen" @click="openMenu">
            <ul class="ham-menu-list">
              <li
                class="ham-menu-item"
                v-if="isLoggedIn && loginData.userType === 'admin'"
              >
                <router-link to="/store_register">出店登録</router-link>
              </li>
              <li
                class="ham-menu-item"
                v-if="isLoggedIn && loginData.userType === 'customer'"
              >
                <router-link to="/mypage">マイページ</router-link>
              </li>
              <li
                class="ham-menu-item cursor-pointer"
                v-if="isLoggedIn"
                @click="logout"
              >
                ログアウト
              </li>
              <template v-if="!isLoggedIn">
                <li class="ham-menu-item">
                  <router-link to="/login">ログイン</router-link>
                </li>
                <li class="ham-menu-item">
                  <router-link to="/register">新規登録</router-link>
                </li>
                <li class="ham-menu-item">
                  <router-link to="/admin_register">出店者新規登録</router-link>
                </li>
              </template>
            </ul>
          </div>
        </transition>
        <!--ハンバーガーメニューの中身-->
        <!-- ナビメニュー -->
        <nav class="hidden md:flex space-x-10"></nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <router-link
            v-if="isLoggedIn && loginData.userType === 'admin'"
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
          <router-link
            v-if="isLoggedIn && loginData.userType === 'customer'"
            to="/mypage"
            class="
              text-white
              whitespace-nowrap
              text-base
              font-medium
              hover:text-gray-900
            "
          >
            マイページ
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
            <router-link
              to="admin_register"
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
              出店者新規登録
            </router-link>
          </template>
          <template v-else>
            <div
              to="/"
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
        <!-- ./ナビメニュー -->
      </div>
    </div>
  </header>
</template>

<script lang="ts">
import { defineComponent, inject, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

export default defineComponent({
  name: "CommonHeader",
  setup() {
    const route = useRoute();
    const router = useRouter();

    const isOpen = ref(false);

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
        loginData.userType = "";
        router.push("/");
      });
    }

    function openMenu() {
      isOpen.value = !isOpen.value;
    }

    return {
      //データ
      route,
      isLoggedIn,
      loginData,
      isOpen,
      // 関数
      logout,
      openMenu,
    };
  },
});
</script>
<style scoped>
/* ハンバーガーメニューの中身のcss */
.hamburger-menu-enter-active,
.hamburger-menu-leave-active {
  opacity: 0.4;
}
.hamburger-menu-enter,
.hamburger-menu-leave-to {
  opacity: 0;
}
.hamburger-menu-leave,
.hamburger-menu-enter-to {
  opacity: 1;
}
.hamburger-menu {
  background-color: hsl(0deg 0% 24% / 72%);
  z-index: 30;
  padding: 0rem 0rem 2rem 6rem;
  position: fixed;
  width: 100%;
  height: 80rem;
  top: 0;
  right: 0;
}
.ham-menu-list {
  padding: 0;
  padding-top: 14px;
  height: 100%;
  background-color: #fff;
}
.ham-menu-item {
  padding: 35px 0;
  list-style: none;
  line-height: 1;
  margin-left: 25px;
}
</style>
