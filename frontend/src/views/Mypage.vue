<template>
  <div class="w-full max-w-4xl mx-auto pt-3">
    <div class="shadow-md rounded border-2 container py-7 px-8 mx-auto">
      <div
        class="
          ml-2
          w-20
          h-20
          rounded-full
          inline-flex
          items-center
          justify-center
          bg-gray-200
          text-gray-400
        "
      >
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          class="w-10 h-10"
          viewBox="0 0 24 24"
        >
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </div>
      <p class="font-bold text-xl mt-2">{{ loginData.userName }}</p>
    </div>
    <!-- ./ユーザ情報  -->
    <div class="container shadow-md rounded border-2 py-4 px-8 mt-5 mx-auto">
      <div>
        <h4 class="font-bold">レビュータイトル</h4>
        <p>2021/10/02</p>
        <p class="text-sm mt-3">
          レビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメントレビューコメント
        </p>
        <p class="mt-1">評価 ★★★☆☆</p>
      </div>
      <div class="mt-2">
        <div
          class="
            mr-2
            w-20
            h-20
            inline-flex
            items-center
            justify-center
            bg-gray-200
            text-gray-400
          "
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            class="w-10 h-10"
            viewBox="0 0 24 24"
          >
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <div
          class="
            mr-2
            w-20
            h-20
            inline-flex
            items-center
            justify-center
            bg-gray-200
            text-gray-400
          "
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            class="w-10 h-10"
            viewBox="0 0 24 24"
          >
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
        <div
          class="
            w-20
            h-20
            inline-flex
            items-center
            justify-center
            bg-gray-200
            text-gray-400
          "
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            class="w-10 h-10"
            viewBox="0 0 24 24"
          >
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </div>
      </div>
    </div>
    <!-- ./レビューアイテム  -->
  </div>
</template>

<script lang="ts">
import { defineComponent, inject } from "vue";

export default defineComponent({
  name: "Mypage",
  setup() {
    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    // ログインしたユーザの情報
    const loginData: any = inject("loginData");

    return {
      // データ
      isLoggedIn,
      loginData,
      // 関数
    };
  },
});
</script>
