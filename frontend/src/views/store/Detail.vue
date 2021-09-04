<template>
  <div></div>
</template>

<script lang="ts">
import { defineComponent, reactive } from "vue";
import axios from "axios";

export default defineComponent({
  name: "StoreDetail",

  setup() {
    const storeData = reactive([]);

    return {
      storeData,
    };
  },
});
</script>
