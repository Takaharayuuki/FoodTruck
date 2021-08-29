<template>
  <div>
    <div
      v-for="data in storeData"
      :key="data.id"
      class="flex border-t border-b border-gray-300 p-4 mt-3"
    >
      <div>
        <img src="../../assets/sample.jpeg" alt="" />
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

const demoData = [
  {
    name: "ケバブケバブ",
    category: "軽食/ ファーストフード",
    address: "渋谷",
    business_hour: "AM:09:00 ~ PM:05:00",
    period: "09/31まで",
    thumbnail_url: "/assets/sample.jpeg",
  },
  {
    name: "ケバブケバブ",
    category: "軽食/ ファーストフード",
    address: "渋谷",
    business_hour: "AM:09:00 ~ PM:05:00",
    period: "09/31まで",
    thumbnail_url: "/assets/sample.jpeg",
  },
  {
    name: "ケバブケバブ",
    category: "軽食/ ファーストフード",
    address: "渋谷",
    business_hour: "AM:09:00 ~ PM:05:00",
    period: "09/31まで",
    thumbnail_url: "/assets/sample.jpeg",
  },
  {
    name: "ケバブケバブ",
    category: "軽食/ ファーストフード",
    address: "渋谷",
    business_hour: "AM:09:00 ~ PM:05:00",
    period: "09/31まで",
    thumbnail_url: "/assets/sample.jpeg",
  },
  {
    name: "ケバブケバブ",
    category: "軽食/ ファーストフード",
    address: "渋谷",
    business_hour: "AM:09:00 ~ PM:05:00",
    period: "09/31まで",
    thumbnail_url: "/assets/sample.jpeg",
  },
];

export default defineComponent({
  name: "StoreIndex",

  setup() {
    const storeData = reactive([]);

    function getStoreData() {
      axios
        .get("api/stores", { withCredentials: true })
        .then((res) => {
          console.log(res);
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
      console.log(storeData);
    });

    return {
      demoData,
      storeData,
    };
  },
});
</script>
