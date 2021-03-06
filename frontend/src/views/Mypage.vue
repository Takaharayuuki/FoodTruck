<template>
  <div class="w-full max-w-4xl mx-auto pt-3">
    <div class="shadow-md rounded border-2 container py-7 px-8 mx-auto">
      <div
        class="
          ml-2
          w-20
          h-20
          rounded-full
          inline-flex
          items-center
          justify-center
          bg-gray-200
          text-gray-400
        "
      >
        <img
          v-if="loginData.thumbnail_url"
          class="w-20 h-20 rounded-full"
          :src="loginData.thumbnail_url"
          alt=""
          style="object-fit: cover"
        />
        <svg
          v-else
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          class="w-10 h-10"
          viewBox="0 0 24 24"
        >
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </div>
      <p class="font-bold text-xl mt-2">{{ loginData.userName }}</p>
    </div>
    <!-- ./ユーザ情報  -->
    <h4 class="text-lg text-gray-900 font-bold title-font mt-3">
      投稿したクチコミ
    </h4>
    <div
      v-for="review in reviewList"
      :key="review.id"
      class="container shadow-md rounded border-2 py-4 px-8 mt-4 mx-auto"
    >
      <div v-if="reviewList.length">
        <div>
          <h4 class="font-bold">{{ review.title }}</h4>
          <p>{{ review.reviewDt }}</p>
        </div>
        <div>
          <p class="text-sm mt-3">
            {{ review.comment }}
          </p>
          <div>
            <p>
              評価
              <star-rating
                :star-size="20"
                :rating="review.rate"
                read-only
                :show-rating="false"
              ></star-rating>
            </p>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <div
          v-if="review.thumbnail_url"
          class="
            w-20
            h-20
            inline-flex
            items-center
            justify-center
            bg-gray-200
            text-gray-400
          "
        >
          <img
            style="object-fit: cover"
            class="w-20 h-20"
            :src="review.thumbnail_url"
            alt=""
          />
        </div>
      </div>
    </div>
    <!-- ./レビューアイテム  -->
  </div>
</template>

<script lang="ts">
import { defineComponent, inject, ref, onMounted, reactive } from "vue";
import axios from "axios";
import StarRating from "vue-star-rating";

export default defineComponent({
  name: "Mypage",
  setup() {
    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    // ログインしたユーザの情報
    const loginData: any = inject("loginData");

    const reviewList = reactive([]);

    let isLoading = ref(false);

    function fetchReviewData() {
      isLoading.value = true;
      axios
        .get(`api/reviews/${loginData.userId}/`, {
          params: {
            path: "mypage",
          },
          withCredentials: true,
        })
        .then((res) => {
          Object.assign(reviewList, res.data);
          isLoading.value = false;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    onMounted(() => {
      fetchReviewData();
    });

    return {
      // データ
      reviewList,
      isLoggedIn,
      loginData,
      // 関数
    };
  },
  components: {
    StarRating,
  },
});
</script>
