<template>
  <div>
    <div class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8">
      <div class="pt-20">
        <h2 class="ext-lg sm:text-6xl text-gray-900 font-bold title-font mb-8">
          {{ storeData.name }}
        </h2>
        <p class="ext-lg sm:text-3xl text-gray-900 font-medium title-font mb-8">
          {{ storeData.remark }}
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
          <div
            v-for="item in productList"
            :key="item.id"
            class="border-t border-b py-4 flex"
          >
            <div class="w-4/6 px-6">
              <p class="text-gray-900 font-semibold text-xl mb-2">
                {{ item.name }}
              </p>
              <p class="text-sm text-gray-400 mb-2">{{ item.remark }}</p>
              <p class="text-green-500">￥{{ item.price }}</p>
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
                :src="item.thumbnail_url"
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
            {{ storeData.city + storeData.town }}<br />
            {{ storeData.postalcode1 + "-" + storeData.postalcode2 }}
            {{ storeData.prefecture }}
          </p>
          <p class="mb-6">地図を表示</p>
          <p class="text-gray-900 font-semibold title-font mb-2">営業時間</p>
          <p>{{ storeData.opening_hours + "〜" + storeData.closing_time }}</p>
        </div>
      </div>
      <!-- 入力フォーム -->
      <div class="grid grid-cols-3 gap-4 pt-20">
        <div class="col-span-2">
          <h4
            class="
              w-full
              text-lg
              sm:text-3xl
              text-gray-900
              font-bold
              title-font
              mb-4
            "
          >
            クチコミ
          </h4>
        </div>
        <div class="col-span-2">
          <div class="flex items-end" style="width: 100%">
            <div class="width:30%;">
              <label for="reviewTitle">タイトル</label>
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
                  focus:outline-none focus:shadow-outline
                "
                id="reviewTitle"
                type="text"
              />
            </div>
            <div class="ml-10 text-lg" style="width: 70%">評価：★★★☆☆</div>
          </div>
          <div class="col-span-2">
            <div style="width: 100%">
              <label for="reviewBody">レビュー本文</label>
              <textarea
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
                  focus:outline-none focus:shadow-outline
                "
                id="reviewBody"
                type="text"
                rows="3"
              ></textarea>
            </div>
          </div>
        </div>
        <!-- ./入力フォーム -->
        <!-- クチコミアイテム -->
        <div class="col-span-2 border-t border-b py-5 px-4">
          <div class="flex gap-4">
            <div style="width: 20%">
              <p>ユーザ名</p>
              <p>評価：★★★☆☆</p>
            </div>
            <div style="width: 70%">
              <p class="text-lg font-bold pb-3">ランチでは十分なボリューム</p>
              <p>
                本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミ本文ダミー
              </p>
            </div>
          </div>
        </div>
        <!-- ./クチコミアイテム -->
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, onMounted } from "vue";
import axios from "axios";

export default defineComponent({
  name: "StoreDetail",
  props: {
    id: { type: Number, require: true },
  },
  setup(props) {
    const storeData = reactive([]);
    const productList = reactive([]);

    onMounted(() => {
      // idの出店情報を取得
      fetchStoreData();
      fetchProductData();
    });

    function fetchStoreData() {
      axios
        .get(`api/stores/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(storeData, response.data);
        })
        .catch((err) => {
          console.log(err);
        });
    }

    function fetchProductData() {
      axios
        .get(`api/products/${props.id}`, { withCredentials: true })
        .then((response) => {
          console.log(response);
          Object.assign(productList, response.data);
          console.log(productList);
        })
        .catch((err) => {
          console.log(err);
        });
    }

    return {
      // データ
      storeData,
      productList,
      // 関数
      fetchStoreData,
      fetchProductData,
    };
  },
});
</script>
