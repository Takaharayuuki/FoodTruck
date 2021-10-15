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
        <div class="col-span-2" v-if="isLoggedIn">
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
              />
            </div>
            <div class="ml-10 text-lg" style="width: 70%">評価：★★★☆☆</div>
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
              ></textarea>
            </div>
            <div class="col-span-2">
              <button
                @click="sendReview"
                class="
                  inline-flex
                  justify-center
                  py-2
                  px-12
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
                投稿する
              </button>
            </div>
          </div>
        </div>
        <!-- ./入力フォーム -->
        <!-- クチコミアイテム -->
        <div class="col-span-2 border-t border-b py-5 px-4">
          <div class="flex gap-4">
            <div style="width: 20%">
              <p>ユーザ名：太郎</p>
              <p>
                評価：<star-rating
                  :star-size="25"
                  :rating="reviewFormData.rate"
                  read-only
                  :show-rating="false"
                ></star-rating>
              </p>
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
import { defineComponent, reactive, onMounted, inject } from "vue";
import axios from "axios";
import StarRating from "vue-star-rating";

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
      storeId: props.id,
      title: "",
      comment: "",
      rate: 3,
    });
    console.log(loginData);

    onMounted(() => {
      // idの出店情報を取得
      fetchStoreData();
      fetchProductData();
      fetchReviewData();
    });

    /* 店舗情報の取得 */
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

    /* 商品情報の取得 */
    function fetchProductData() {
      axios
        .get(`api/products/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(productList, response.data);
        })
        .catch((err) => {
          console.log(err);
        });
    }

    /* クチコミ情報の取得 */
    function fetchReviewData() {
      axios
        .get(`api/reviews/${props.id}`, { withCredentials: true })
        .then((response) => {
          Object.assign(reviewList, response.data);
        })
        .catch((err) => {
          console.log(err);
        });
    }

    /* クチコミの投稿送信 */
    function sendReview() {
      axios
        .post("api/reviews/store", reviewFormData)
        .then((res) => {
          reviewFormData.title = "";
          reviewFormData.comment = "";
          reviewFormData.rate = 0;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    return {
      // データ
      isLoggedIn,
      storeData,
      productList,
      reviewFormData,
      // 関数
      fetchStoreData,
      fetchProductData,
      fetchReviewData,
      sendReview,
    };
  },
  components: {
    StarRating,
  },
});
</script>
