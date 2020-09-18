<template>
  <div>
    <div class="icon-box bg-white border-top py-2">
      <button @click="postShow" class="btn-clear mx-5">
        <i class="far fa-comment"></i>
      </button>
      <button
        v-if="!bookmark"
        @click="addBookmark"

        class="btn-clear"
      >
        <i class="far fa-folder-open"></i>
      </button>
      <button
        v-else
        @click="deleteBookmark(bookmark)"
        class="btn-clear"
      >
        <i class="far fa-folder-open does-bookmark"></i>
      </button>
      <button
        v-if="isOwner"
        @click="jumpEdit(recipeId)"

        class="btn-clear mx-5"
      >
        <i class="far fa-edit"></i>
      </button>
      <button v-if="isOwner" @click="confirmRecipeDeletion" class="btn-clear">
        <i class="far fa-trash-alt"></i>
      </button>
    </div>

    <form
      ref="bookmarkAddition"
      action="/bookmarks"
      method="POST"
      class="hidden"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="recipe_id" :value="recipeId" />
    </form>

    <form
      action=""
      ref="bookmarkDeletion"
      method="POST"
      class="hidden"
      id="bookmarkDeletion"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>

    <form
      ref="recipeDeletion"
      :action="'/recipes/' + recipeId"
      method="POST"
      class="hidden"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: ["recipeId", "csrf", "bookmark", "isOwner"],
  methods: {
    postShow() {
      this.$emit("post-show");
    },

    addBookmark(id) {
      this.$refs.bookmarkAddition.submit();
    },
    deleteBookmark(bookmark) {
      let that = this;
      let form = this.$refs.bookmarkDeletion;
      that.$dialog
        .confirm(
          {
            title: "確認",
            body: "ブックマークを解除してもよろしいですか？",
          },
          {
            okText: "はい",
            cancelText: "キャンセル",
          }
        )
        .then(function() {
          form.action = "/bookmarks/" + bookmark.id;
          that.$refs.bookmarkDeletion.submit();
        });
    },
    jumpEdit(id) {
      location.href = "/recipes/" + id + "/edit";
    },
    confirmRecipeDeletion(id) {
      let that = this;
      that.$dialog
        .confirm(
          {
            title: "確認",
            body: "レシピを削除してもよろしいですか？",
          },
          {
            okText: "はい",
            cancelText: "キャンセル",
          }
        )
        .then(function() {
          that.$refs.recipeDeletion.submit();
        });
    },
  },
};
</script>

<style scoped>
.icon-box {
  width: 80%;
  margin: 0 auto;
  position: relative;
}
.icon-box button {
  display: inline-block;
  padding: 0;
}
.icon-box button:hover {
  cursor: pointer;
  opacity: 0.6;
}

.icon-box i::before {
  vertical-align: middle;
  font-size: 1.5rem;
}
.icon-box .does-bookmark::before {
  color: cornflowerblue;
}

@media (max-width: 575.5px) {
  .icon-box {
    width: 100%;
  }
}
</style>
