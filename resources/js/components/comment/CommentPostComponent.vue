<template>
  <div>
    <transition
      name="accordion"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
    >
      <div v-if="show" @click.self="close" class="new-comment-bg">
        <div class="new-comment-box" id="newCommentBox">
          <form
            ref="newCommentPosts"
            action="/comments"
            method="POST"
            class="cf"
          >
            <input type="hidden" name="_token" :value="csrf" />
            <input type="hidden" name="_method" value="POST" />
            <input
              type="number"
              name="recipe_id"
              :value="recipeId"
              class="hidden"
            />
            <div class="form-group mb-2">
              <label class="pl-2">コメント</label>
              <div v-show="error">
                <small class="text-danger">{{ error }}</small>
              </div>
              <textarea
                type="text"
                name="comment"
                class="form-control"
                rows="8"
                v-model="comment"
                ref="commentTextarea"
                placeholder="コメントを入力してください。300文字以内"
              />
              <small class="form-text text-muted"></small>
              <div class="btn-box ml-2">
                <button
                  type="button"
                  class="btn btn-outline-dark mt-1"
                  @click="close"
                >
                  キャンセル
                </button>
                <button
                  @click.stop="validate"
                  type="button"
                  class="btn btn-primary mt-1 mx-2"
                >
                  送信
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: ["show", "recipeId", "csrf"],
  data() {
    return {
      comment: "",
      error: "",
    };
  },
  methods: {
    enter(el) {
      el.style.height = el.scrollHeight + "px";
      let s = document.documentElement;
      let y = s.scrollHeight - s.clientHeight;
      window.scroll(0, y);
      Vue.nextTick().then(() => this.$refs.commentTextarea.focus());
    },
    beforeLeave(el) {
      el.style.height = el.scrollHeight + "px";
    },
    leave(el) {
      el.style.height = "0";
    },
    close() {
      this.error = "";
      this.$emit("close");
    },
    validate() {
      let cm = this.comment;
      let er = "";
      if (cm.length < 1) {
        er = "未入力です";
      }
      if (cm.length > 300) {
        er = "300文字を超えています";
      }
      if (er.length > 0) {
        this.error = er;
      } else {
        this.submitNewComment();
      }
    },
    submitNewComment() {
      this.$refs.newCommentPosts.submit();
    },
  },
};
</script>

<style scoped>
.new-comment-bg {
  overflow: hidden;
  transition: all 0.5s ease-in-out;
}

.new-comment-box {
  margin: 0 auto;
  margin-top: 20px;
  background-color: #fff;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.6);
  border-radius: 5px;
  width: 70%;
}
.new-comment-box form {
  width: 100%;
}

@media (max-width: 899px) {
  .new-comment-box {
    width: 75%;
  }
}
@media (max-width: 575.5px) {
  .new-comment-box {
    width: 95%;
  }
}
</style>
