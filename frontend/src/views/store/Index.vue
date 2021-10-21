<template>
  <div class="vld-parent max-w-7xl mx-auto">
    <loading
      :active="isLoading"
      :can-cancel="true"
      :is-full-page="true"
      color="#007BFF"
    ></loading>
    <div class="flex items-baseline px-5 pt-24 mb-8">
      <h4 class="text-4xl text-gray-900 font-bold title-font">検索結果</h4>
      <p class="ml-4">
        全<span class="mx-1 text-gray-900 text-lg font-bold">{{
          storeData.length
        }}</span
        >件
      </p>
    </div>
    <section class="text-gray-600 body-font">
      <div class="container max-w-7xl px-5 pb-24 mx-auto">
        <div class="flex flex-wrap -m-4">
          <!-- card コンポーネント化する -->
          <router-link
            :to="`/${data.id}`"
            v-for="data in storeData"
            :key="data.id"
            class="p-4 md:w-1/3"
          >
            <div
              class="
                h-full
                border-2 border-gray-200 border-opacity-60
                overflow-hidden
              "
            >
              <!-- 通常用 -->
              <img
                class="lg:h-40 md:h-22 w-full object-cover object-center"
                :src="data.thumbnail_url"
                alt="blog"
              />
              <!-- 通常用 -->
              <!-- heroku不具合用 -->
              <!-- <img
                class="lg:h-40 md:h-22 w-full object-cover object-center"
                :src="`data:image/png;base64,${data.thumbnail_url}`"
                alt="blog"
              /> -->
              <!-- heroku不具合用 -->
              <div class="p-6">
                <h2
                  class="
                    tracking-widest
                    text-xs
                    title-font
                    font-medium
                    text-gray-400
                    mb-1
                  "
                >
                  {{ data.category }}
                </h2>
                <h1 class="title-font text-lg font-medium text-gray-900 mb-1">
                  {{ data.name }}
                </h1>
                <p class="leading-relaxed mb-1">
                  出店場所: {{ data.prefecture + data.city + data.town }}
                </p>
                <div class="flex items-center flex-wrap">
                  <a
                    class="
                      text-indigo-500
                      inline-flex
                      items-center
                      md:mb-1
                      lg:mb-0
                    "
                    style="margin-bottom: -8px; margin-right: 16px"
                    >詳しくみる
                    <svg
                      class="w-4 h-4 ml-2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path d="M5 12h14"></path>
                      <path d="M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                  <star-rating
                    :star-size="20"
                    :rating="data.rate"
                    read-only
                    :show-rating="false"
                  ></star-rating>
                </div>
              </div>
            </div>
          </router-link>
          <!-- card コンポーネント化する -->
        </div>
      </div>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, onMounted, ref } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";
import StarRating from "vue-star-rating";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default defineComponent({
  name: "StoreIndex",

  setup() {
    const storeData = reactive([]);
    let isLoading = ref(false);

    function fetchStoreData() {
      isLoading.value = true;
      axios
        .post("api/stores/search", {
          searchWord: localStorage.getItem("searchWord"),
          searchArea: localStorage.getItem("searchArea"),
        })
        .then((res) => {
          res.data.forEach((element: { [key: string]: string }) => {
            storeData.push(element as never);
          });
          isLoading.value = false;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    onMounted(() => {
      fetchStoreData();
    });

    return {
      storeData,
      isLoading,
    };
  },
  components: {
    StarRating,
    Loading,
  },
});
</script>
