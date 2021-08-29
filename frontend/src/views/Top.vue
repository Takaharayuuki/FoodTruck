<template>
  <div>
    <div class="fixed top-96 w-full flex items-center justify-center">
      <div
        class="
          flex
          items-center
          justify-center
          py-12
          px-6
          sm:px-6
          lg:px-8
          max-w-7xl
          w-full
        "
      >
        <div class="w-full mx-auto">
          <div
            class="w-full bg-white shadow-md border rounded px-8 pt-6 pb-8 mb-4"
          >
            <div class="grid grid-cols-12">
              <div class="col-span-10 flex mt-1 relative rounded-md shadow-sm">
                <input
                  type="text"
                  name="price"
                  id="price"
                  class="
                    h-12
                    border border-yellow-700
                    focus:ring-indigo-500 focus:border-indigo-500
                    block
                    w-full
                    pl-7
                    pr-12
                    sm:text-sm
                    rounded-sm
                  "
                  placeholder="キーワード [例:ハンバーガー、店名、軽食]"
                />
                <input
                  type="text"
                  name="price"
                  id="price"
                  class="
                    h-12
                    border border-l-0 border-yellow-700
                    focus:ring-indigo-500 focus:border-indigo-500
                    block
                    w-full
                    pl-7
                    pr-12
                    sm:text-sm
                    rounded-sm
                  "
                  placeholder="エリア・駅 [例:渋谷,池袋]"
                />
              </div>
              <div class="col-span-2">
                <button
                  type="button"
                  class="
                    w-full
                    h-full
                    text-center
                    px-4
                    py-2
                    border border-transparent
                    rounded-sm
                    shadow-sm
                    text-sm
                    font-medium
                    text-white
                    bg-yellow-500
                    hover:bg-yellow-600
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-yellow-500
                  "
                >
                  検索する
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "Top",
});
</script>
