<template>
  <div>
    <h1>出店新規登録ページ</h1>
    <div class="py-10 container mx-auto">
      <div class="max-w-3xl">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form v-on:submit.prevent="save">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-12">
                    <label
                      for="storeName"
                      class="block text-sm font-medium text-gray-700"
                      >店舗名</label
                    >
                    <input
                      type="text"
                      name="storeName"
                      id="storeName"
                      v-model="storeData.name"
                      autocomplete="given-name"
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

                  <div class="col-span-6 sm:col-span-3">
                    <label
                      for="category"
                      class="block text-sm font-medium text-gray-700"
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
                    <label
                      for="storeAddress"
                      class="block text-sm font-medium text-gray-700"
                      >出店場所</label
                    >
                    <input
                      type="text"
                      name="storeAddress"
                      id="storeAddress"
                      v-model="storeData.address"
                      autocomplete="family-name"
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

                  <div class="col-span-12">
                    <label
                      for="storePeriod"
                      class="block text-sm font-medium text-gray-700"
                      >出店期間</label
                    >
                    <input
                      type="text"
                      name="storePeriod"
                      id="storePeriod"
                      v-model="storeData.period"
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
                    <label
                      for="storeBusinessHour"
                      class="block text-sm font-medium text-gray-700"
                      >営業時間</label
                    >
                    <input
                      type="text"
                      name="storeBusinessHour"
                      id="storeBusinessHour"
                      v-model="storeData.business_hours"
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
                    <label
                      for="remark"
                      class="block text-sm font-medium text-gray-700"
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

                  <div class="col-span-12">
                    <label class="block text-sm font-medium text-gray-700">
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
                      <div class="space-y-1 text-center">
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
                            <span>Upload a file</span>
                            <input
                              id="file-upload"
                              name="file-upload"
                              type="file"
                              class="sr-only"
                              @change="onFileSelected"
                            />
                          </label>
                          <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                          PNG, JPG, GIF up to 10MB
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button
                  type="submit"
                  class="
                    inline-flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    shadow-sm
                    text-sm
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
    <pre>{{ storeData }}</pre>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, ref } from "vue";
import { categoryList } from "../../data";
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
      address: "",
      period: "",
      business_hours: "",
      remark: "",
    });
    // 出店画像データ
    const file = ref<File | null>(null);

    const isEnter = ref(false);

    function dragEnter() {
      console.log("dragEnter");
      isEnter.value = true;
    }

    function dragLeave() {
      console.log("dragLeave");
      isEnter.value = false;
    }

    function dropFile(event: Event) {
      event.preventDefault();
      isEnter.value = false;
    }

    function save() {
      const formData = new FormData();
      formData.append("file", file.value as any);
      formData.append("storeName", storeData.name);
      formData.append("storeCategory", storeData.category);
      formData.append("storeAddress", storeData.address);
      formData.append("storePeriod", storeData.period);
      formData.append("storeBusinessHours", storeData.business_hours);
      formData.append("storeRemark", storeData.remark);

      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      axios
        .post("api/stores", formData, config)
        .then((res) => {
          alert("登録が完了しました。");
        })
        .catch((err) => {
          console.log(err);
        });
    }

    function onFileSelected(e: HTMLElementEvent<HTMLInputElement>) {
      file.value = e.target.files![0];
    }

    return {
      // オプション
      categoryList,
      // データ
      storeData,
      file,
      isEnter,
      // 関数
      save,
      onFileSelected,
      dragEnter,
      dragLeave,
      dropFile,
    };
  },
});
</script>
<style scoped>
.enter {
  border: 2px dashed rgb(255, 160, 16);
}
</style>
