<template>
  <div>
    <div class="py-10 container mx-auto">
      <div class="max-w-3xl">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form v-on:submit.prevent="save">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-12 gap-6">
                  <!-- 出店登録 -->
                  <div class="col-span-12 text-lg font-semibold">出店登録</div>
                  <div class="col-span-6 sm:col-span-5">
                    <label
                      for="storeName"
                      class="block text-sm font-semibold text-gray-700"
                      >店舗名</label
                    >
                    <input
                      type="text"
                      name="storeName"
                      id="storeName"
                      v-model="storeData.name"
                      class="
                        px-2
                        h-10
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        border border-gr
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>

                  <div class="col-span-6 sm:col-span-5">
                    <label
                      for="category"
                      class="block text-sm font-semibold text-gray-700"
                      >ジャンル</label
                    >
                    <select
                      id="category"
                      name="category"
                      v-model="storeData.category"
                      class="
                        mt-1
                        block
                        w-full
                        py-2
                        px-3
                        border border-gray-300
                        bg-white
                        rounded-md
                        shadow-sm
                        focus:outline-none
                        focus:ring-indigo-500
                        focus:border-indigo-500
                        sm:text-sm
                      "
                    >
                      <option
                        v-for="category in categoryList"
                        :key="category.id"
                      >
                        {{ category.value }}
                      </option>
                    </select>
                  </div>

                  <div class="col-span-12">
                    <p class="block text-sm font-semibold text-gray-700 mb-2">
                      出店場所
                    </p>

                    <div class="grid grid-cols-8 gap-6 mb-2">
                      <div class="postal">
                        <label
                          for="storePostal1"
                          class="block text-sm font-medium text-gray-700"
                          >郵便番号</label
                        >
                        <input
                          type="text"
                          name="storePostal1"
                          id="storePostal1"
                          v-model="storeData.postalcode1"
                          class="
                            px-2
                            mt-1
                            h-10
                            border
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                      <div class="mt-5">
                        <input
                          type="text"
                          name="storePostal2"
                          id="storePostal2"
                          v-model="storeData.postalcode2"
                          class="
                            px-2
                            mt-1
                            h-10
                            border
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                      <div>
                        <label
                          for="storePrefecture"
                          class="block text-sm font-medium text-gray-700"
                          >都道府県</label
                        >
                        <select
                          name="storePrefecture"
                          id="storePrefecture"
                          v-model="storeData.prefecture"
                          class="
                            mt-1
                            block
                            w-full
                            py-2
                            px-3
                            border border-gray-300
                            bg-white
                            rounded-md
                            shadow-sm
                            focus:outline-none
                            focus:ring-indigo-500
                            focus:border-indigo-500
                            sm:text-sm
                          "
                        >
                          <option
                            v-for="prefecture in prefectureOptions"
                            :key="prefecture.id"
                          >
                            {{ prefecture.value }}
                          </option>
                        </select>
                      </div>
                      <div>
                        <label
                          for="storeCity"
                          class="block text-sm font-medium text-gray-700"
                          >市区町村</label
                        >
                        <input
                          type="text"
                          name="storeCity"
                          id="storeCity"
                          v-model="storeData.city"
                          class="
                            px-2
                            mt-1
                            h-10
                            border
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                      <div>
                        <label
                          for="storeTown"
                          class="block text-sm font-medium text-gray-700"
                          >地名・番地</label
                        >
                        <input
                          type="text"
                          name="storeTown"
                          id="storeTown"
                          v-model="storeData.town"
                          class="
                            px-2
                            mt-1
                            h-10
                            border
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-span-12">
                    <label
                      for="storeAddressRemark"
                      class="block text-sm font-medium text-gray-700"
                      >備考（出店場所の近隣の建物名等）</label
                    >
                    <input
                      type="text"
                      name="storeAddressRemark"
                      id="storeAddressRemark"
                      v-model="storeData.addressRemark"
                      class="
                        px-2
                        h-10
                        border
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>

                  <div class="col-span-12">
                    <p class="block text-sm font-semibold text-gray-700 mb-2">
                      出店期間
                    </p>
                    <div class="grid grid-cols-4 gap-6">
                      <div class="hours">
                        <input
                          type="date"
                          name="storePeriod1"
                          id="storePeriod1"
                          v-model="storeData.period1"
                          class="
                            px-2
                            h-10
                            border
                            mt-1
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                      <div>
                        <input
                          type="date"
                          name="storePeriod2"
                          id="storePeriod2"
                          v-model="storeData.period2"
                          class="
                            px-2
                            h-10
                            border
                            mt-1
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-span-12">
                    <p class="block text-sm font-semibold text-gray-700 mb-2">
                      営業時間
                    </p>
                    <div class="grid grid-cols-4 gap-6">
                      <div class="hours">
                        <input
                          type="time"
                          name="storeOpeningHours"
                          id="storeOpeningHours"
                          v-model="storeData.opening_hours"
                          class="
                            px-2
                            h-10
                            border
                            mt-1
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                      <div>
                        <input
                          type="time"
                          name="storeClosingTime"
                          id="storeClosingTime"
                          v-model="storeData.closing_time"
                          class="
                            px-2
                            h-10
                            border
                            mt-1
                            focus:ring-indigo-500 focus:border-indigo-500
                            block
                            w-full
                            shadow-sm
                            sm:text-sm
                            border-gray-300
                            rounded-md
                          "
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-span-12">
                    <label
                      for="remark"
                      class="block text-sm font-semibold text-gray-700"
                      >備考</label
                    >
                    <input
                      type="text"
                      name="remark"
                      id="remark"
                      v-model="storeData.remark"
                      class="
                        px-2
                        h-10
                        border
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>

                  <div class="col-span-4">
                    <label class="block text-sm font-semibold text-gray-700">
                      店舗画像
                    </label>
                    <div
                      @dragenter="dragEnter('store')"
                      @dragleave="dragLeave('store')"
                      @dragover.prevent
                      @drop.prevent="dropFile($event, 'store')"
                      :class="{ enter: isStoreEnter }"
                      class="
                        mt-1
                        flex
                        justify-center
                        px-6
                        pt-5
                        pb-6
                        border-2 border-gray-300 border-dashed
                        rounded-md
                      "
                    >
                      <div
                        v-if="storeFiles.length === 0"
                        class="space-y-1 text-center"
                      >
                        <svg
                          class="mx-auto h-12 w-12 text-gray-400"
                          stroke="currentColor"
                          fill="none"
                          viewBox="0 0 48 48"
                          aria-hidden="true"
                        >
                          <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label
                            for="storeFile-upload"
                            class="
                              relative
                              cursor-pointer
                              bg-white
                              rounded-md
                              font-medium
                              text-indigo-600
                              hover:text-indigo-500
                              focus-within:outline-none
                              focus-within:ring-2
                              focus-within:ring-offset-2
                              focus-within:ring-indigo-500
                            "
                          >
                            <span>画像をアップロードする</span>
                            <input
                              id="storeFile-upload"
                              name="storeFile-upload"
                              type="file"
                              class="sr-only"
                              @change="onFileSelected($event, 'store')"
                            />
                          </label>
                          <!-- <p class="pl-1">ドラッグ&ドロップ</p> -->
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF</p>
                      </div>
                      <div class="flex" v-else>
                        <div
                          v-for="(data, index) in storeImageData"
                          :key="index"
                        >
                          <div class="relative">
                            <span
                              @click="deleteFile(index, 'store')"
                              class="deletemark cursor-pointer"
                              >x</span
                            >
                            <img :src="data.url" alt="" width="70" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ./出店登録 -->
                </div>
                <!-- 商品登録 -->
                <div class="col-span-12">
                  <div class="text-lg font-semibold mt-5 mb-3">商品登録</div>
                </div>
                <p class="text-sm mb-1">
                  商品情報を入力し、「商品を登録する」ボタンを押下してください。<br />
                  複数商品の登録も可能です。
                </p>
                <!-- TODO: コンポーネント化する -->
                <div
                  class="
                    grid grid-cols-12
                    gap-6
                    shadow-md
                    overflow-hidden
                    sm:rounded-md
                    px-4
                    py-5
                  "
                  style="border: solid 1px #c5c5c5"
                >
                  <div class="col-span-6 sm:col-span-5">
                    <label
                      for="productName"
                      class="block text-sm font-semibold text-gray-700"
                      >商品名</label
                    >
                    <input
                      type="text"
                      name="productName"
                      id="productName"
                      v-model="productData.name"
                      class="
                        px-2
                        h-10
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        border border-gr
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>
                  <div class="col-span-6 sm:col-span-4">
                    <label
                      for="productPrice"
                      class="block text-sm font-semibold text-gray-700"
                      >価格</label
                    >
                    <input
                      type="text"
                      name="productPrice"
                      id="productPrice"
                      v-model.number="productData.price"
                      class="
                        text-right
                        px-2
                        h-10
                        mt-1
                        inline-block
                        focus:ring-indigo-500 focus:border-indigo-500
                        shadow-sm
                        border border-gr
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                    <span style="padding-left: 5px">円</span>
                  </div>
                  <div class="col-span-12">
                    <label
                      for="productRemark"
                      class="block text-sm font-semibold text-gray-700"
                      >商品説明</label
                    >
                    <input
                      type="text"
                      name="productRemark"
                      id="productRemark"
                      v-model="productData.remark"
                      class="
                        px-2
                        h-10
                        border
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>
                  <div class="col-span-4">
                    <label class="block text-sm font-semibold text-gray-700">
                      商品画像
                    </label>
                    <div
                      @dragenter="dragEnter('product')"
                      @dragleave="dragLeave('product')"
                      @dragover.prevent
                      @drop.prevent="dropFile($event, 'product')"
                      :class="{ enter: isProductEnter }"
                      class="
                        mt-1
                        flex
                        justify-center
                        px-6
                        pt-5
                        pb-6
                        border-2 border-gray-300 border-dashed
                        rounded-md
                      "
                    >
                      <div
                        v-if="productImageData.length === 0"
                        class="space-y-1 text-center"
                      >
                        <svg
                          class="mx-auto h-12 w-12 text-gray-400"
                          stroke="currentColor"
                          fill="none"
                          viewBox="0 0 48 48"
                          aria-hidden="true"
                        >
                          <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label
                            for="productFile-upload"
                            class="
                              relative
                              cursor-pointer
                              bg-white
                              rounded-md
                              font-medium
                              text-indigo-600
                              hover:text-indigo-500
                              focus-within:outline-none
                              focus-within:ring-2
                              focus-within:ring-offset-2
                              focus-within:ring-indigo-500
                            "
                          >
                            <span>画像をアップロードする</span>
                            <input
                              id="productFile-upload"
                              name="productFile-upload"
                              type="file"
                              class="sr-only"
                              @change="onFileSelected($event, 'product')"
                            />
                          </label>
                          <!-- <p class="pl-1">ドラッグ&ドロップ</p> -->
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF</p>
                      </div>
                      <div class="flex" v-else>
                        <div
                          v-for="(data, index) in productImageData"
                          :key="index"
                        >
                          <div class="relative">
                            <span
                              @click="deleteFile(index, 'product')"
                              class="deletemark cursor-pointer"
                              >x</span
                            >
                            <img :src="data.url" alt="" width="70" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-12 text-right cursor-pointer">
                    <span
                      @click="addProduct"
                      class="
                        bg-indigo-600
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-indigo-500
                        shadow
                        overflow-hidden
                        sm:rounded-md
                        text-white text-sm
                        py-2
                        px-4
                        mr-4
                      "
                    >
                      ＋商品を登録する
                    </span>
                  </div>
                </div>
                <!-- ./商品登録 -->
                <span class="inline-block font-semibold text-gray-700 mt-1"
                  >仮登録済み商品</span
                >
                <div class="flex">
                  <div
                    class="mr-4"
                    v-for="(item, index) in productList"
                    :key="item.id"
                  >
                    <div class="relative">
                      <p>{{ item.name + "\n" + item.price + "円" }}</p>
                      <span
                        @click="deleteProductItem(index)"
                        class="deletemark cursor-pointer"
                        >x</span
                      >
                      <img :src="item.thumbnail_url" alt="" width="70" />
                    </div>
                  </div>
                </div>
                <!-- ./仮登録済み商品 -->
              </div>
              <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                <button
                  type="submit"
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
                  登録する
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <pre>{{ productList }}</pre>
  </div>
</template>

<script lang="ts">
import { defineComponent, Events, reactive, ref } from "vue";
import { categoryList, prefectureOptions } from "../../data";
import axios from "axios";

interface HTMLElementEvent<T extends HTMLElement> extends Event {
  target: T;
}

export default defineComponent({
  name: "StoreRegister",
  setup() {
    // 出店登録データ
    // TODO:  modelを作成して型をつける
    const storeData = reactive({
      name: "",
      category: "",
      postalcode1: "",
      postalcode2: "",
      prefecture: "",
      city: "",
      town: "",
      addressRemark: "",
      period1: "",
      period2: "",
      opening_hours: "",
      closing_time: "",
      remark: "",
    });
    // 出店画像データ
    const storeFiles = ref<File[] | null>([]);
    const storeImageData: any = reactive([]);
    // ドラッグ&ドロップ フラグ
    const isStoreEnter = ref(false);

    // 商品登録データ
    // TODO:  modelを作成して型をつける
    const productData = reactive({
      name: "",
      price: null,
      remark: "",
      thumbnail_url: "",
    });
    // 商品画像データ
    const productFiles = ref<File[] | null>([]);
    const productImageData: any = reactive([]);
    // ドラッグ&ドロップ フラグ
    const isProductEnter = ref(false);
    // 商品リストデータ
    const productList = reactive([]);

    // 画像アップロード関連
    function onFileSelected(
      event: HTMLElementEvent<HTMLInputElement>,
      itemType: string
    ) {
      console.log(itemType);

      if (itemType === "store") {
        if (event.target.files !== null) {
          storeFiles.value?.push(event.target.files[0]);
          storeImageData?.push({
            url: URL.createObjectURL(event.target.files[0]),
            name: event.target.files[0].name,
          });
        }
      }
      if (itemType === "product") {
        if (event.target.files !== null) {
          productFiles.value?.push(event.target.files[0]);
          productImageData?.push({
            url: URL.createObjectURL(event.target.files[0]),
            name: event.target.files[0].name,
          });
          productData.thumbnail_url = URL.createObjectURL(
            event.target.files[0]
          );
        }
      }
    }

    function dragEnter(itemType: string) {
      itemType === "store"
        ? (isStoreEnter.value = true)
        : (isProductEnter.value = true);
    }

    function dragLeave(itemType: string) {
      itemType === "store"
        ? (isStoreEnter.value = false)
        : (isProductEnter.value = false);
    }

    function dropFile(event: DragEvent | any, itemType: string) {
      event.preventDefault();
      if (itemType === "store") {
        storeFiles.value?.push(...event.dataTransfer.files);
        storeImageData.push({
          url: URL.createObjectURL(event.dataTransfer.files[0] as any),
          name: event.dataTransfer.files[0].name,
        });
        isStoreEnter.value = false;
      }
      if (itemType === "product") {
        productFiles.value?.push(...event.dataTransfer.files);
        productImageData.push({
          url: URL.createObjectURL(event.dataTransfer.files[0] as any),
          name: event.dataTransfer.files[0].name,
        });
        isProductEnter.value = false;
      }
    }

    function deleteFile(index: number, itemType: string) {
      if (itemType === "store") {
        storeFiles.value?.splice(index, 1);
        storeImageData.splice(index, 1);
      } else if (itemType === "product") {
        productFiles.value?.splice(index, 1);
        productImageData.splice(index, 1);
      }
    }

    function addProduct() {
      if (productData.name === "" || productData.price === null) {
        return alert("商品名、価格は必須項目です。");
      }
      const item = {
        name: "",
        price: null,
        remark: "",
        thumbnail_url: "",
      };
      item.name = productData.name;
      item.price = productData.price;
      item.remark = productData.remark;
      item.thumbnail_url = productData.thumbnail_url;
      productList.push(item as never);
      productData.name = "";
      productData.price = null;
      productData.remark = "";
      productData.thumbnail_url = "";
      productImageData.length = 0;
    }

    function deleteProductItem(index: number) {
      productList.splice(index, 1);
    }

    // 出店情報の保存
    function save() {
      // formDataの作成
      const formData = new FormData();
      // 出店画像のappend
      storeFiles.value?.forEach((file) => {
        formData.append("file", file);
      });
      formData.append("storeName", storeData.name);
      formData.append("storeCategory", storeData.category);
      formData.append("storePostal1", storeData.postalcode1);
      formData.append("storePostal2", storeData.postalcode2);
      formData.append("storePrefecture", storeData.prefecture);
      formData.append("storeCity", storeData.city);
      formData.append("storeTown", storeData.town);
      formData.append("storeAddressRemark", storeData.addressRemark);
      formData.append("storePeriod1", storeData.period1);
      formData.append("storePeriod2", storeData.period2);
      formData.append("storeOpeningHours", storeData.opening_hours);
      formData.append("storeClosingTime", storeData.closing_time);
      formData.append("storeRemark", storeData.remark);
      // axiosの設定
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      axios
        .post("api/stores", formData, config)
        .then((res) => {
          if (productList.length) {
            // 店舗登録が成功したら商品を登録する
            return saveProduct();
          }
          return alert("出店情報の登録が完了しました。");
        })
        .catch((err) => {
          console.log(err);
        });
    }

    // 商品情報の保存
    function saveProduct() {
      const productFormData = new FormData();
      // 商品画像のappend
      productFiles.value?.forEach((file) => {
        productFormData.append("file", file);
      });
      // そのまま送ると[Object object]になるのでJSON文字列に変換
      const jsonArray = productList.map((el) => JSON.stringify(el));
      jsonArray.forEach((value) => {
        //複数送りたいときは配列にする "product[]"
        productFormData.append("product[]", value as any);
      });
      // axiosの設定
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      axios
        .post("api/products", productFormData, config)
        .then((res) => {
          console.log(res);
          alert("出店・商品情報の登録が完了しました。");
        })
        .catch((err) => {
          console.log(err);
        });
    }

    return {
      // オプション
      categoryList,
      prefectureOptions,
      // データ
      storeData,
      productData,
      storeFiles,
      productFiles,
      storeImageData,
      productImageData,
      isStoreEnter,
      isProductEnter,
      productList,
      // 関数
      save,
      saveProduct,
      onFileSelected,
      dragEnter,
      dragLeave,
      dropFile,
      deleteFile,
      addProduct,
      deleteProductItem,
    };
  },
});
</script>
<style scoped>
.enter {
  border: 2px dashed rgb(255, 160, 16);
}
.deletemark {
  position: absolute;
  top: -14px;
  right: -10px;
  font-size: 20px;
  z-index: 2;
}

.hours {
  position: relative;
}

.hours::after {
  position: absolute;
  top: 12px;
  right: -20px;
  content: "〜";
}

.postal {
  position: relative;
}
.postal::after {
  position: absolute;
  top: 33px;
  right: -20px;
  content: "ー";
}
</style>
