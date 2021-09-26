<template>
  <div>
  <div class="pt-80 w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8 text-white">
    <h2 class="title-font sm:text-5xl  mb-4 font-medium">近くの移動販売車、出店、キッチンカーを探す</h2>
  </div>
  <!-- 検索バー TODO: コンポーネント化する -->
  <div class="pt-1 w-full flex items-center justify-center">
    <div class="flex items-center justify-center py-12 px-6 sm:px-6 lg:px-8 max-w-7xl w-full">
      <div class="w-full mx-auto">
        <div class="w-full bg-white shadow-md border rounded px-8 pt-6 pb-8 mb-4">
          <div class="grid grid-cols-12">
            <div class="col-span-10 flex mt-1 relative rounded-md shadow-sm">
              <input type="text" name="price" class="h-12 border border-yellow-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm rounded-sm" placeholder="キーワード [例:ハンバーガー、店名、軽食]" />
              <input type="text" name="price" class="h-12 border border-l-0 border-yellow-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm rounded-sm" placeholder="エリア・駅 [例:渋谷,池袋]" />
            </div>
            <div class="col-span-2">
              <button type="button" @click="onSearch" class="w-full h-full text-center px-2 py-2 border border-transparent rounded-sm shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">近くのキッチンカーを探す</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- メインカテゴリ -->
  <main class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold">エリアから検索</h2>
    <p></p>
    <h2 class="text-2xl font-semibold">ジャンルから検索</h2>
    <p></p>
  </main>
</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useRouter } from "vue-router";

export default defineComponent({
  name: "Top",
  setup() {
    const router = useRouter();

    const searchWord = reactive('');

    function onSearch() {
      router.push("/store_index");
    }
    console.log();
    return {
      // データ
      searchWord,
      // 関数
      onSearch,
    };
  },
});
</script>
