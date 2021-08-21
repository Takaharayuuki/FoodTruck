<template>
  <div>
    <h1 class="text-4x text-center font-semibold">新規登録</h1>
    <div class="w-full max-w-lg mx-auto">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="text-left mb-4">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="userEmail"
          >
            メールアドレス
          </label>
          <input
            class="
              shadow
              appearance-none
              border
              rounded
              w-full
              py-2
              px-3
              text-gray-700
              leading-tight
              focus:outline-none
              focus:shadow-outline
            "
            id="userEmail"
            type="text"
            placeholder="foodtruck@example.com"
          />
        </div>

        <div class="text-left mb-4">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="userName"
          >
            ユーザーネーム
          </label>
          <input
            class="
              shadow
              appearance-none
              border
              rounded
              w-full
              py-2
              px-3
              text-gray-700
              leading-tight
              focus:outline-none
              focus:shadow-outline
            "
            id="userName"
            type="text"
            placeholder="田中 太郎"
          />
        </div>

        <div class="text-left mb-6">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="password"
          >
            パスワード
          </label>
          <input
            class="
              shadow
              appearance-none
              rounded
              w-full
              py-2
              px-3
              text-gray-700
              mb-3
              leading-tight
              focus:outline-none
              focus:shadow-outline
            "
            id="password"
            type="password"
            placeholder="******"
          />
          <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
        </div>
        <div class="flex items-center justify-between">
          <button
            class="
              bg-blue-500
              hover:bg-blue-700
              text-white
              font-bold
              py-2
              px-4
              rounded
              focus:outline-none
              focus:shadow-outline
              w-1/2
              mr-1
            "
            type="button"
          >
            登録
          </button>
          <router-link
            class="
              inline-block
              font-bold
              text-sm text-blue-500
              hover:text-blue-800
              rounded
              w-1/2
              py-2
              px-4
              border border-blue-500
            "
            to="/login"
          >
            ログイン
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "",
});
</script>
