<template>
  <div>
    <div
      style="padding-top: 16rem"
      class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8"
    >
      <h2
        class="title-font sm:text-5xl mb-4 font-medium"
        style="color: #333333; line-height: 1.3"
      >
        近くの移動販売車、出店<br />
        キッチンカーを探す
      </h2>
    </div>
    <!-- 検索バー TODO: コンポーネント化する -->
    <div class="w-full flex items-center justify-center relative">
      <div class="top-icon"></div>
      <div
        class="
          flex
          items-center
          justify-center
          p-48
          pb-12
          px-6
          sm:px-6
          lg:px-8
          max-w-7xl
          w-full
        "
      >
        <div class="w-full mx-auto">
          <div
            class="w-full bg-white shadow-md border rounded px-8 pt-6 pb-8 mb-4"
          >
            <div class="grid grid-cols-12">
              <div class="col-span-10 flex relative rounded-md shadow-sm">
                <input
                  v-model="searchWord"
                  type="text"
                  name="keyword"
                  class="
                    h-12
                    border border-yellow-700
                    focus:ring-yellow-600 focus:border-b-yellow-600
                    block
                    w-full
                    pl-3
                    pr-12
                    sm:text-sm
                    rounded-sm
                  "
                  placeholder="キーワード [例:ハンバーガー、店名、軽食]"
                />
                <input
                  v-model="searchArea"
                  type="text"
                  name="area"
                  class="
                    h-12
                    border border-l-0 border-yellow-700
                    focus:ring-yellow-600 focus:border-b-yellow-600
                    block
                    w-full
                    pl-3
                    pr-12
                    sm:text-sm
                    rounded-sm
                  "
                  placeholder="エリア・駅 [例:渋谷,池袋]"
                />
              </div>
              <div class="col-span-2">
                <button
                  type="button"
                  @click="onSearch"
                  class="
                    w-full
                    h-full
                    text-center
                    px-2
                    py-2
                    border border-transparent
                    rounded-sm
                    shadow-sm
                    text-sm
                    font-medium
                    text-white
                    bg-yellow-500
                    hover:bg-yellow-600
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-yellow-500
                  "
                >
                  近くのキッチンカーを探す
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- メインカテゴリ -->
    <main class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8"></main>
  </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, ref, watch } from "vue";
import { useRouter } from "vue-router";

export default defineComponent({
  name: "Top",
  setup() {
    const router = useRouter();
    const searchArea = ref("");
    const searchWord = ref("");

    function onSearch() {
      router.push({
        name: "StoreIndex",
      });
    }

    watch(searchArea, () => {
      localStorage.setItem("searchArea", searchArea.value);
    });

    watch(searchWord, () => {
      localStorage.setItem("searchWord", searchWord.value);
    });

    onMounted(() => {
      localStorage.removeItem("searchArea"),
        localStorage.removeItem("searchWord");
    });

    return {
      //データ
      searchArea,
      searchWord,
      // 関数
      onSearch,
    };
  },
});
</script>
<style scoped>
.top-icon {
  position: absolute;
  right: 16%;
  top: -434px;
  z-index: -5;
  background-image: url("../assets/top_icon_01.png");
  width: 659px;
  height: 611px;
  background-size: cover;
}
</style>
