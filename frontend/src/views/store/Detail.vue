<template>
  <div class="vld-parent">
    <loading
      :active="isLoading"
      :can-cancel="true"
      :is-full-page="true"
      color="#007BFF"
    ></loading>
    <div
      class="w-full mx-auto max-w-7xl px-6 sm:px-6 lg:px-8"
      v-if="!isLoading"
    >
      <div class="pt-20">
        <h2 class="ext-lg sm:text-6xl text-gray-900 font-bold title-font mb-8">
          {{ storeData.name }}
        </h2>
        <p class="ext-lg sm:text-3xl text-gray-900 font-medium title-font mb-8">
          {{ storeData.remark }}
        </p>
        <div
          class="
            flex
            ext-lg
            sm:text-3xl
            text-gray-900
            font-semibold
            title-font
            mb-8
          "
        >
          <p style="margin-top: 13px">評価：</p>
          <star-rating
            :star-size="30"
            :rating="storeData.rate"
            read-only
            :show-rating="false"
          ></star-rating>
        </div>
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
      <div class="grid grid-cols-3 py-20">
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
        <div class="col-span-1"></div>
        <div class="col-span-2 mb-10" v-if="isLoggedIn">
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
                v-model="reviewFormData.title"
                id="reviewTitle"
                type="text"
                @focus="resetError"
              />
              <span class="text-red-600" v-if="errors.title !== ''">{{
                errors.title
              }}</span>
            </div>
            <div class="ml-10 text-lg" style="width: 70%">
              <star-rating
                :star-size="25"
                :rating="reviewFormData.rate"
                @update:rating="setRating"
              ></star-rating>
            </div>
          </div>
          <div class="col-span-2">
            <div style="width: 100%">
              <label for="reviewComment">レビュー本文</label>
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
                v-model="reviewFormData.comment"
                id="reviewComment"
                type="text"
                rows="3"
                @focus="resetError"
              ></textarea>
              <span class="text-red-600" v-if="errors.comment !== ''">{{
                errors.comment
              }}</span>
            </div>
            <div class="col-span-2 text-center pt-2">
              <button
                @click="sendReview"
                class="
                  inline-flex
                  justify-center
                  py-2
                  px-20
                  border border-transparent
                  shadow-sm
                  font-medium
                  rounded-md
                  text-white
                  bg-indigo-600
                  hover:bg-indigo-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-indigo-500
                "
              >
                クチコミを投稿する
              </button>
            </div>
          </div>
        </div>
        <!-- ./入力フォーム -->
      </div>
      <div
        class="grid grid-cols-3"
        v-for="review in reviewList"
        :key="review.id"
      >
        <!-- クチコミアイテム -->
        <div class="col-span-2 border-t py-5 px-4">
          <div class="flex gap-4">
            <div style="width: 30%">
              <p>{{ review.user_name }}</p>
              <p>{{ review.reviewDt }}</p>
              <p>
                評価：<star-rating
                  :star-size="25"
                  :rating="review.rate"
                  read-only
                  :show-rating="false"
                ></star-rating>
              </p>
            </div>
            <div style="width: 70%">
              <p class="text-lg font-bold pb-3">{{ review.title }}</p>
              <p>{{ review.comment }}</p>
            </div>
          </div>
        </div>
        <div class="col-span-1"></div>
        <!-- ./クチコミアイテム -->
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, onMounted, inject, ref } from "vue";
import axios from "axios";
import StarRating from "vue-star-rating";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import dayjs, { Dayjs } from "dayjs";

export default defineComponent({
  name: "StoreDetail",
  props: {
    id: { type: Number, require: true },
  },
  setup(props) {
    /** 店舗情報 */
    const storeData = reactive([]);
    /** 商品データ */
    const productList = reactive([]);
    /** 商品データ */
    const reviewList = reactive([]);
    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    /* ログインしたユーザの情報 */
    const loginData: any = inject("loginData");
    /** クチコミ入力データ */
    const reviewFormData = reactive({
      userId: loginData.userId,
      userName: loginData.userName,
      storeId: props.id,
      title: "",
      comment: "",
      rate: 3,
      reviewDt: "" as any,
      thumbnail_url: "",
    });
    let isLoading = ref(false);

    const errors = reactive({
      title: "",
      comment: "",
    });

    onMounted(() => {
      // idの出店情報を取得
      fetchStoreData();
      fetchProductData();
      fetchReviewData();
    });

    /* 店舗情報の取得 */
    function fetchStoreData() {
      isLoading.value = true;
      axios
        .get(`api/stores/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(storeData, response.data);
          isLoading.value = false;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    /* 商品情報の取得 */
    function fetchProductData() {
      isLoading.value = true;
      axios
        .get(`api/products/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(productList, response.data);
          isLoading.value = false;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    /* クチコミ情報の取得 */
    function fetchReviewData() {
      isLoading.value = true;
      axios
        .get(`api/reviews/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(reviewList, response.data);
          isLoading.value = false;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    /* クチコミの投稿送信 */
    function sendReview() {
      reviewFormData.reviewDt = dayjs().format("YYYY-MM-DD");
      axios
        .post("api/reviews", reviewFormData)
        .then((res) => {
          reviewFormData.title = "";
          reviewFormData.comment = "";
          reviewFormData.rate = 0;
          fetchReviewData();
        })
        .catch((error) => {
          if (error.response.data.errors.title) {
            errors.title = error.response.data.errors.title[0];
          }
          if (error.response.data.errors.comment) {
            errors.comment = error.response.data.errors.comment[0];
          }
        });
    }

    function setRating(rating: number) {
      reviewFormData.rate = rating;
      console.log(reviewFormData.rate);
    }

    function resetError() {
      errors.title = "";
      errors.comment = "";
    }

    return {
      // データ
      isLoggedIn,
      isLoading,
      storeData,
      productList,
      reviewList,
      reviewFormData,
      errors,
      // 関数
      fetchStoreData,
      fetchProductData,
      fetchReviewData,
      sendReview,
      setRating,
      resetError,
    };
  },
  components: {
    StarRating,
    Loading,
  },
});
</script>
