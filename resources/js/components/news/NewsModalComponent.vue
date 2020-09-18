<template>
  <div>
    <transition name="slide-y">
      <div class="news-modal-bg" v-show="show" @click.self="$emit('close')">
        <div class="news-modal">
          <h3 class="border-bottom text-center w-100 m-0">NEWS</h3>
          <div class="news-modal-content p-2">{{ news.content }}</div>
          <div class="news-modal-footer cf">
            <button class="btn btn-outline-dark" @click="$emit('close')">
              OK
            </button>
            <button
              v-if="isOwner"
              @click="deleteNews"
              class="submit-btn btn-clear"
            >
              <i class="far fa-trash-alt"> </i>
            </button>
          </div>
        </div>
      </div>
    </transition>
    <form :action="'/news/' + news.id" ref="newsDeletion" method="POST">
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: ["show", "isOwner","news", "csrf"],
  methods: {
    deleteNews() {
      let that = this;
      that.$dialog
        .confirm(
          {
            title: "確認",
            body: "ニュースを削除してもよろしいですか？",
          },
          {
            okText: "はい",
            cancelText: "キャンセル",
          }
        )
        .then(function() {
          that.$refs.newsDeletion.submit();
        });
    },
  },
};
</script>

<style scoped>
.news-modal-bg {
  position: fixed;
  display: flex;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
  z-index: 2;
}
.news-modal {
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.6);
  background-color: #fff;
  overflow: hidden;
  border-radius: 8px;
  position: absolute;
  width: 60%;
  height: 350px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.news-modal h3 {
  height: 20%;
  line-height: 60px;
}
.news-modal-content {
  height: 60%;
  overflow-y: auto;
  white-space: pre-wrap;
}
.news-modal-content::-webkit-scrollbar {
  width: 5px;
}

.news-modal-content::-webkit-scrollbar-thumb {
  background: gray;
  border-radius: 10px;
}
.news-modal-footer {
  height: 20%;
  background-color: #ededed;
  padding: 10px;
  position: relative;
}
.news-modal-footer button {
  display: block;
  margin: 0 auto;
  letter-spacing: 2px;
  padding: 4px 20px;
  line-height: 30px;
}
.news-modal-footer .submit-btn {
  display: inline-block;
  padding: 0;
  position: absolute;
  top: 15%;
  right: 5%;
  cursor: pointer;
}
.news-modal-footer .submit-btn:hover {
  opacity: 0.7;
}
.news-modal-footer i::before {
  font-size: 2rem;
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
  .news-modal {
    width: 90%;
  }
}
</style>
