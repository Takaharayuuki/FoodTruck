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
                      @dragenter="dragEnter"
                      @dragleave="dragLeave"
                      @dragover.prevent
                      @drop.prevent="dropFile"
                      :class="{ enter: isEnter }"
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
                        v-if="files.length === 0"
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
                            for="file-upload"
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
                              id="file-upload"
                              name="file-upload"
                              type="file"
                              class="sr-only"
                              @change="onFileSelected"
                            />
                          </label>
                          <!-- <p class="pl-1">ドラッグ&ドロップ</p> -->
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF</p>
                      </div>
                      <div class="flex" v-else>
                        <div v-for="(data, index) in imageData" :key="index">
                          <div class="relative">
                            <span
                              @click="deleteFile(index)"
                              class="deletemark cursor-pointer"
                              >x</span
                            >
                            <img :src="data.url" alt="" width="70" />
                            <p>{{ data.name }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ./出店登録 -->
                </div>
                <!-- 商品登録 -->
                <div class="col-span-12">
                  <div class="text-lg font-semibold my-5">商品登録</div>
                </div>
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
                  <div class="col-span-6 sm:col-span-4">
                    <label
                      for="productPrice"
                      class="block text-sm font-semibold text-gray-700"
                      >価格</label
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
                  <div class="col-span-12">
                    <label
                      for="productRemark"
                      class="block text-sm font-semibold text-gray-700"
                      >商品説明</label
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
                      商品画像
                    </label>
                    <div
                      @dragenter="dragEnter"
                      @dragleave="dragLeave"
                      @dragover.prevent
                      @drop.prevent="dropFile"
                      :class="{ enter: isEnter }"
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
                        v-if="files.length === 0"
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
                            for="file-upload"
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
                              id="file-upload"
                              name="file-upload"
                              type="file"
                              class="sr-only"
                              @change="onFileSelected"
                            />
                          </label>
                          <!-- <p class="pl-1">ドラッグ&ドロップ</p> -->
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF</p>
                      </div>
                      <div class="flex" v-else>
                        <div v-for="(data, index) in imageData" :key="index">
                          <div class="relative">
                            <span
                              @click="deleteFile(index)"
                              class="deletemark cursor-pointer"
                              >x</span
                            >
                            <img :src="data.url" alt="" width="70" />
                            <p>{{ data.name }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-12 text-right cursor-pointer">
                    <span
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
                      "
                    >
                      ＋商品を追加する
                    </span>
                  </div>
                </div>
                <!-- ./商品登録 -->
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
    // 出店登録フォームデータ
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
    const files = ref<File[] | null>([]);
    const imageData: any = reactive([]);

    const isEnter = ref(false);

    function dragEnter() {
      console.log("dragEnter");
      isEnter.value = true;
    }

    function dragLeave() {
      console.log("dragLeave");
      isEnter.value = false;
    }

    function dropFile(event: DragEvent | any) {
      event.preventDefault();
      files.value?.push(...event.dataTransfer.files);
      imageData.push({
        url: URL.createObjectURL(event.dataTransfer.files[0] as any),
        name: event.dataTransfer.files[0].name,
      });
      isEnter.value = false;
    }

    function deleteFile(index: number) {
      files.value?.splice(index, 1);
      imageData.splice(index, 1);
    }

    function save() {
      const formData = new FormData();
      files.value?.forEach((file) => {
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
      // formData.append("productList", productList);

      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      axios
        .post("api/stores", formData, config)
        .then((res) => {
          // 店舗登録が成功したら商品を登録する
          axios
            .post("api/products", { productList: productList })
            .then((res) => {
              console.log(res);
              alert("登録が全て完了しました。");
            })
            .catch((err) => {
              console.log(err);
            });
        })
        .catch((err) => {
          console.log(err);
        });
    }

    function onFileSelected(event: HTMLElementEvent<HTMLInputElement>) {
      if (event.target.files !== null) {
        files.value?.push(event.target.files[0]);
        imageData?.push({
          url: URL.createObjectURL(event.target.files[0]),
          name: event.target.files[0].name,
        });
      }
      // files.value?.push(...event.dataTransfer.files);
      // imageData.push({
      //   url: URL.createObjectURL(event.dataTransfer.files[0] as any),
      //   name: event.dataTransfer.files[0].name,
      // });
    }

    // 商品登録
    const productList = reactive<[{ [key: string]: string }]>([
      {
        name: "商品名",
        price: "100円",
        remark: "説明",
        image: "img.png",
      },
    ]);

    return {
      // オプション
      categoryList,
      prefectureOptions,
      // データ
      storeData,
      files,
      imageData,
      isEnter,
      // 関数
      save,
      onFileSelected,
      dragEnter,
      dragLeave,
      dropFile,
      deleteFile,
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
