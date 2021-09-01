<template>
  <div>
    <div
      v-for="data in storeData"
      :key="data.id"
      class="flex border-t border-b border-gray-300 p-4 mt-3"
    >
      <div>
        <img :src="data.thumbnail_url" alt="" />
      </div>
      <div>
        <p>店舗名:{{ data.name }}</p>
        <p>ジャンル:{{ data.category }}</p>
        <p>出店住所:{{ data.address }}</p>
        <p>営業時間:{{ data.business_hours }}</p>
        <p>出店期間:{{ data.period }}</p>
        <p>レビュー評価</p>
      </div>
    </div>
    <pre>{{ storeData }}</pre>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, onMounted } from "vue";
import axios from "axios";

export default defineComponent({
  name: "StoreIndex",

  setup() {
    const storeData = reactive([]);

    function getStoreData() {
      axios
        .get("api/stores", { withCredentials: true })
        .then((res) => {
          res.data.forEach((element: { [key: string]: string }) => {
            storeData.push(element as never);
          });
        })
        .catch((err) => {
          console.log(err);
        });
    }

    onMounted(() => {
      getStoreData();
    });

    return {
      storeData,
    };
  },
});
</script>
