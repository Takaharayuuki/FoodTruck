<template>
  <div>
    <div class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8 md:flex items-center">
      <h2 class="pt-12 md:pt-0 title-font md:text-5xl text-3xl mb-4 font-medium" style="color: #333333; line-height: 1.3">
        近くの移動販売車、出店<br />
        キッチンカーを探す
      </h2>
      <img class="top-icon mx-auto" src="../assets/top_icon_01.png" alt="" />
    </div>
    <!-- 検索バー TODO: コンポーネント化する -->
    <div class="w-full flex items-center justify-center relative">
      <div class="flex items-center justify-center pb-12 px-6 sm:px-6 lg:px-8 max-w-7xl w-full">
        <div class="w-full mx-auto">
          <div class="w-full bg-white shadow-md border rounded px-4 pt-4 pb-4 mb-4">
            <div class="grid grid-cols-12">
              <div class="mb-3 md:mb-0 md:col-span-4 col-span-12 flex relative rounded-md shadow-sm">
                <input v-model="searchWord" type="text" name="keyword" class="h-12 border border-yellow-700 focus:ring-yellow-600 focus:border-b-yellow-600 block w-full pl-3 text-sm rounded-sm" placeholder="キーワード [例:ハンバーガー]" />
              </div>
              <div class="mb-3 md:mb-0 md:col-span-4 col-span-12 flex relative rounded-md shadow-sm">
                <input v-model="searchArea" type="text" name="area" class="h-12 border md:border-l-0 border-yellow-700 focus:ring-yellow-600 focus:border-b-yellow-600 block w-full pl-3 text-sm rounded-sm" placeholder="エリア・駅 [例:池袋,渋谷]" />
              </div>
              <div class="md:col-span-4 col-span-12">
                <button type="button" @click="onSearch" class="w-full h-full text-center px-2 py-2 border border-transparent rounded-sm shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">近くのキッチンカーを探す</button>
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
import { defineComponent, onMounted, ref, watch } from 'vue';
import { useRouter } from 'vue-router';

export default defineComponent({
  name: 'Top',
  setup() {
    const router = useRouter();
    const searchArea = ref('');
    const searchWord = ref('');

    function onSearch() {
      router.push({
        name: 'StoreIndex',
      });
    }

    watch(searchArea, () => {
      localStorage.setItem('searchArea', searchArea.value);
    });

    watch(searchWord, () => {
      localStorage.setItem('searchWord', searchWord.value);
    });

    onMounted(() => {
      localStorage.removeItem('searchArea'), localStorage.removeItem('searchWord');
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
@media screen and (min-width: 768px) {
  .top-icon {
    max-width: 53%;
  }
}
input[type='text'] {
  font-size: 16px;
}
</style>
