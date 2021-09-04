<template>
  <div>
    <div class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8">
      <div class="pt-20">
        <h2 class="ext-lg sm:text-6xl text-gray-900 font-bold title-font mb-8">
          ケバブ専門店 ハッスルハッスル
        </h2>
        <p class="ext-lg sm:text-3xl text-gray-900 font-medium title-font mb-8">
          屋台や移動販売などでも話題の肉料理ケバブの専門店です🥙野菜と一緒にピタパンに挟んだケバブサンドは、気軽に食べられる軽食としても人気です。
        </p>
        <p
          class="ext-lg sm:text-3xl text-gray-900 font-semibold title-font mb-8"
        >
          評価：☆☆☆☆☆
        </p>
      </div>
      <div class="grid grid-cols-3 gap-4 pt-20">
        <div class="col-span-2">
          <h4
            class="ext-lg sm:text-3xl text-gray-900 font-bold title-font mb-8"
          >
            メニュー表
          </h4>
          <div class="border-t border-b py-4 flex">
            <div class="w-4/6 px-6">
              <p class="text-gray-900 font-semibold text-xl mb-2">
                激辛ケバブサンド
              </p>
              <p class="text-sm text-gray-400 mb-2">
                肉厚なウェンディーズオリジナルのビーフパティにアメリカの代表的なチーズ「ペッパージャックチーズ」と「チェダーチーズソース」、2種類のチーズを組み合わせ旨味をぎゅっと閉じ込めた濃厚な味わいのプリクックドベーコンを挟みました。
              </p>
              <p class="text-green-500">￥840</p>
            </div>
            <div class="w-2/6">
              <img
                alt="team"
                class="
                  flex-shrink-0
                  rounded-lg
                  w-48
                  h-48
                  object-cover object-center
                  sm:mb-0
                  mb-4
                "
                src="https://dummyimage.com/201x201"
              />
            </div>
          </div>
        </div>
        <div class="col-span-1">
          <h4 class="ext-lg sm:text-xl text-gray-900 font-bold title-font mb-8">
            出店情報
          </h4>
          <p class="text-gray-900 font-semibold title-font mb-2">住所</p>
          <p>
            渋谷区宇田川町26-11 白馬ビル1F <br />
            150-0042 Tokyo
          </p>
          <p class="mb-6">地図を表示</p>
          <p class="text-gray-900 font-semibold title-font mb-2">営業時間</p>
          <p>09.45–23.30</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive } from "vue";
import axios from "axios";

export default defineComponent({
  name: "StoreDetail",
  props: {
    id: { type: Number, require: true },
  },
  setup(props) {
    const storeData = reactive([]);

    return {
      storeData,
    };
  },
});
</script>
