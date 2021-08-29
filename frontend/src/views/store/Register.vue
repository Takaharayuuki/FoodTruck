<template>
  <div>
    <h1>出店新規登録ページ</h1>
    <div class="py-10 container mx-auto">
      <div class="max-w-3xl">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="#" method="POST">
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
                      <option>軽食/ジャンクフード</option>
                      <option>和食</option>
                      <option>クレープ</option>
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
                      v-model="storeData.businessHour"
                      class="
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

export default defineComponent({
  name: "StoreRegister",
  setup() {
    // 出店登録フォームデータ
    const storeData = reactive({
      name: "",
      category: "",
      address: "",
      period: "",
      businessHour: "",
      remark: "",
    });
    // 出店画像データ
    const file = ref<File | null>(null);

    return {
      // データ
      storeData,
      file,
    };
  },
});
</script>
