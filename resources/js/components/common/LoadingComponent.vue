<template>
  <div v-show="show" class="bg">
    <vue-loading
      type="spin"
      color="#1F6ED4"
      :size="{ width: '50px', height: '50px' }"
    ></vue-loading>
  </div>
</template>

<script>
import { VueLoading } from "vue-loading-template";
export default {
  data() {
    return {
      show: false,
    };
  },
  mounted: function() {
    let that = this;
    window.addEventListener("beforeunload", function() {
      console.log("leaveload");
      that.show = true;
    });
  },
  components: {
    "vue-loading": VueLoading,
  },
  methods: {
    open() {
      this.show = true;
    },
  },
};
</script>

<style scoped>
.bg {
  position: fixed;
  display: flex;
  background-color: rgba(0,0,0,0.1);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
  z-index: 5;
}
</style>
