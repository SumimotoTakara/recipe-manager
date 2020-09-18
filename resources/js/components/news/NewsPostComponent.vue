<template>
  <div>
    <transition name="slide-y">
      <div class="news-post-bg" v-show="show" @click.self="close">
        <div class="news-post py-2 px-1">
          <h3 class="text-center w-100">NEWS</h3>

          <form ref="newsPosts" action="/news" method="POST">
            <input type="hidden" name="_token" :value="csrf" />
            <small class="text-danger ">{{ errors }}</small>
            <textarea
              v-model.trim="content"
              name="content"
              rows="7"
              placeholder="内容を入力してください。300文字以内"
              ref="contentTextarea"
            ></textarea>
            <div class="news-post-close">
              <button
                type="button"
                class="btn btn-outline-dark mx-2"
                @click="close"
              >
                キャンセル
              </button>
              <button
                @click="validateNewsPosts"
                type="button"
                class="btn btn-primary"
              >
                送信
              </button>
            </div>
          </form>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: ["show", "csrf"],
  data() {
    return {
      content: "",
      errors: "",
    };
  },
  watch: {
    show(newValue) {
      if (newValue === true) {
        Vue.nextTick().then(() => this.$refs.contentTextarea.focus());
      }
    },
  },
  methods: {
    close() {
      this.errors = "";
      this.$emit("close");
    },
    validateNewsPosts() {
      let co = this.content;
      var er = "";

      if (co.length < 1) {
        er = "未入力です";
      } else if (co.length > 300) {
        er = "300文字以内で入力してください";
      }

      if (er.length < 1) {
        this.submitNews();
      } else {
        this.errors = er;
      }
    },
    submitNews() {
      this.$refs.newsPosts.submit();
    },
  },
};
</script>

<style scoped>
.news-post-bg {
  position: fixed;
  display: flex;
  background-color: rgba(0,0,0,0.7);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
  z-index: 2;
}
.news-post {
  background-color: #fff;
  overflow: hidden;
  border-radius: 8px;
  position: absolute;
  width: 50%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.news-post textarea {
  width: 100%;
  height: 80%;
  margin-top: 10px;
  border: 1px solid;
  border-radius: 3px;
}

.slide-y-enter-active {
  animation: slide-y-in 0.3s;
}
.slide-y-leave-active {
  animation: slide-y-in 0.3s reverse;
}
@keyframes slide-y-in {
  from {
    transform: translateY(-100%);
  }

  to {
    transform: translateY(0%);
  }
}
@media (max-width: 899px) {
  .news-post {
    width: 90%;
  }
}
</style>
