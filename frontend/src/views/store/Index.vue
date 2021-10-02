<template>
  <div class="max-w-7xl mx-auto">
    <h4
      class="px-5 pt-24 ext-lg text-4xl text-gray-900 font-bold title-font mb-8"
    >
      検索結果
    </h4>
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
              <img
                class="lg:h-40 md:h-22 w-full object-cover object-center"
                :src="data.thumbnail_url"
                alt="blog"
              />
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
                  <span
                    class="
                      text-gray-400
                      mr-3
                      inline-flex
                      items-center
                      lg:ml-auto
                      md:ml-0
                      ml-auto
                      leading-none
                      text-sm
                      pr-3
                      py-1
                    "
                  >
                    ★★★★★★
                  </span>
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
import { defineComponent, reactive, onMounted } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";

export default defineComponent({
  name: "StoreIndex",

  setup() {
    const route = useRoute();
    const storeData = reactive([]);
    console.log(route.params);

    function getStoreData() {
      axios
        .post("api/stores/search", {
          searchWord: route.params.searchWord,
          searchArea: route.params.searchArea,
        })
        .then((res) => {
          console.log(res);

          // res.data.forEach((element: { [key: string]: string }) => {
          //   storeData.push(element as never);
          // });
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
