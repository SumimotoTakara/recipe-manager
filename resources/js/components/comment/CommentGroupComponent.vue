<template>
  <div v-if="comments.length > 0" class="comment-box" id="commentBox">
    <table class="table mb-0 border-bottom bg-white">
      <tr
        class="p-2"
        v-for="comment in displayComments"
        :key="comment.id"
        :class="{ mine: admin(comment) }"
      >
        <td class="user">
          <img
            :src="
              'http://xs055583.xsrv.jp/storage/images/profile_images/' +
                comment.shop_user.user.profile_image
            "
            alt=""
            @error="onError"
          />
          <p class="mb-0">{{ comment.shop_user.user.name }}</p>
        </td>
        <td @click="confirmDeletion(comment)" class="comment-content-td">
          <div class="comment-content">
            <!-- ここの空白をなくす -->{{ comment.comment }}
          </div>
          <span class="day">{{ comment.created_at.slice(0, 10) }}</span>
        </td>
      </tr>
    </table>

    <div v-if="comments.length > loadNum" class="load-more bg-white">
      <a @click.prevent.once="showThread" href="">スレッドを全て表示</a>
    </div>

    <form ref="commentDeletion" action="" method="POST">
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: ["comments", "userId", "isOwner", "csrf"],
  data() {
    return {
      loadNum: 3,
    };
  },
  computed: {
    displayComments() {
      let result = this.comments.slice();
      if (result.length > 3) {
        result = result.slice(0, this.loadNum);
      }
      return result;
    },
  },
  methods: {
    admin(comment) {
      if (comment.shop_user.user.id === this.userId || this.isOwner === true) {
        return true;
      }
    },
    showThread() {
      this.loadNum = this.comments.length;
    },
    confirmDeletion(comment) {
      if (this.userId === comment.shop_user.user.id || this.isOwner === true) {
        let that = this;
        let form = this.$refs.commentDeletion;
        this.$dialog
          .confirm(
            {
              title: "確認",
              body: "コメントを削除してもよろしいですか？",
            },
            {
              okText: "はい",
              cancelText: "キャンセル",
            }
          )
          .then(function() {
            form.action = "/comments/" + comment.id;
            that.submitDeletion();
          })
      }
    },
    submitDeletion() {
      this.$refs.commentDeletion.submit();
    },
  },
};
</script>

<style scoped>
.comment-box {
  width: 80%;
  margin: 0 auto;
}
table {
  table-layout: fixed;
}
table tr {
  cursor: default;
}

.comment-box .mine {
  cursor: pointer;
  transition: all 0.4s;
}
.comment-box .mine:hover {
  background-color: rgba(0, 0, 0, 0.1);
}

.user {
  width: 172px;
  overflow: hidden;
}
.user p {
  font-size: 0.9rem;
  white-space: nowrap;
  cursor: default;
}
.comment-content-td {
  padding: 5px 10px 25px 5px;
  position: relative;
}
.comment-content {
  max-height: 100px;
  overflow-y: auto;
  white-space: pre-wrap;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
}

.comment-content::-webkit-scrollbar {
  width: 5px;
}

.comment-content::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 10px;
}

.comment-content-td span {
  display: inline-block;
  width: 100%;
  text-align: right;
  position: absolute;
  bottom: 0;
  right: 5px;
}
.day {
  color: #6c757d;
  width: 17%;

  vertical-align: middle;
}

.user img {
  display: inline-block;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
}

.bookmark-box {
  width: 130px;
  top: 0%;
  left: 10%;
}
.load-more a {
  display: block;
  padding: 0.5rem;
  cursor: pointer;
  transition: all 0.2s;
}
.load-more a:hover {
  color: #3490dc;
  background-color: rgba(0, 0, 0, 0.1);
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 10s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

@media (max-width: 899px) {
  .user {
    width: 90px;
  }
  .user p {
    font-size: 0.75rem;
  }
  .user img {
    width: 50px;
    height: 50px;
  }
  .comment-content {
    height: 84px;
  }
  .day {
    font-size: 100%;
  }
}
@media (max-width: 575.5px) {
  .comment-box {
    width: 100%;
  }
  .comment-content {
    font-size: 0.9rem;
  }
}
</style>
