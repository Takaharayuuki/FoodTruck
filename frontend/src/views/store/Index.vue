<template>
  <div>
    <div
      v-for="data in demoData"
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
        <p>営業時間:{{ data.business_hour }}</p>
        <p>出店期間:{{ data.period }}</p>
        <p>レビュー評価</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive } from "vue";

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
    const storeData = reactive({
      name: "",
      category: "",
      address: "",
      business_hour: "",
      period: "",
      thumbnail_url: "",
    });

    return {
      demoData,
      storeData,
    };
  },
});
</script>
