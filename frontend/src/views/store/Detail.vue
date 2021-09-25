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
              <p class="text-sm text-gray-400 mb-2">
                {{ item.remark }}
              </p>
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
