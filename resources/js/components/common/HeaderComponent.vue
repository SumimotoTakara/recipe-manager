<template>
  <div>
    <div class="menu mt-1">
      <a v-if="isOwner" href="/recipes/create"
        ><button type="button" class="btn btn-outline-secondary btn-sm">
          新規作成
        </button>
      </a>
      <a v-if="isOwner" href="/shopusers">
        <button type="button" class="btn btn-outline-secondary btn-sm ml-2">
          ユーザー一覧
        </button>
      </a>
      <button
        type="button"
        class="btn btn-outline-secondary btn-sm ml-2"
        @click="openBookmark"
      >
        ブックマーク
      </button>
      <bookmark-component
        :bookmarkShow="bookmarkShow"
        :bookmarks="bookmarks"
        :csrf="csrf"
      ></bookmark-component>
    </div>
  </div>
</template>

<script>
export default {
  props: ["bookmarks","isOwner"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      bookmarkShow: false,
    };
  },
  methods: {
    openBookmark() {
      if (this.bookmarkShow === false) {
        this.bookmarkShow = true;
        setTimeout(this.closeBookmark, 6000);
      } else {
        this.bookmarkShow = false;
      }
    },
    closeBookmark() {
      this.bookmarkShow = false;
    },
  },
};
</script>

<style scoped>
.menu {
  font-size: 1.4rem;
  float: right;
}
.menu button {
  color: aliceblue;
}
@media (max-width: 899px) {
  .menu {
    margin-top: 10px;
    float: none;
    text-align: center;
  }
}
</style>
