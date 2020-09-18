<template>
  <div class="news-box">
    <div class="news-header cf border-bottom m-0 pb-1">
      <h3 class="news-heading pl-2 mb-0 mr-5">NEWS!</h3>
      <a v-show="thisMonth" @click="backNews" class="last-month">先月</a>
      <a v-show="lastMonth" @click="nextNews" class="next-month">今月</a>
      <button v-if="isOwner" @click="togglePostShow" class="btn-clear post-btn">
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <div class="news-body">
      <transition :name="style" mode="out-in">
        <transition-group
          tag="table"
          :name="style"
          v-if="displayNews.length > 0"
        >
          <tr
            v-for="n in displayNews"
            :key="n.id"
            @click="openModalShow(n)"
            class="border-top border-bottom"
          >
            <td class="day text-center">{{ n.created_at.slice(5, 10) }}</td>
            <td class="content">{{ n.content }}</td>
          </tr>
        </transition-group>

        <div v-else class="no-news">
          No News
        </div>
      </transition>
    </div>

    <news-modal-component
      :show="modalShow"
      :isOwner="isOwner"
      :news="selectedNews"
      :csrf="csrf"
      @close="closeModalShow"
    ></news-modal-component>

    <news-post-component
      :show="postShow"
      :csrf="csrf"
      @close="togglePostShow"
    ></news-post-component>
  </div>
</template>

<script>
export default {
  props: ["thisMonthNews", "lastMonthNews", "csrf", "isOwner"],
  data() {
    return {
      modalShow: false,
      postShow: false,
      selectedNews: "",
      thisMonth: true,
      lastMonth: false,
      style: "",
    };
  },
  computed: {
    displayNews() {
      if (this.thisMonth) {
        return this.thisMonthNews;
      } else if (this.lastMonth) {
        return this.lastMonthNews;
      }
    },
  },
  methods: {
    backNews() {
      this.thisMonth = false;
      this.lastMonth = true;
      this.style = "slide-right";
    },
    nextNews() {
      this.lastMonth = false;
      this.thisMonth = true;
      this.style = "slide-left";
    },
    openModalShow(news) {
      this.selectedNews = news;
      this.modalShow = true;
    },
    closeModalShow() {
      this.selectedNews = "";
      this.modalShow = false;
    },
    togglePostShow() {
      this.postShow = !this.postShow;
    },
  },
};
</script>

<style scoped>
.news-header {
  position: relative;
}
h3 {
  cursor: default;
}
.news-header .last-month,
.news-header .next-month {
  display: inline-block;
  cursor: pointer;
}
.news-header .news-heading {
  display: inline-block;
  color: #fe5f55;
}
.news-header .post-btn {
  display: inline-block;
  padding: 0;
  position: absolute;
  top: 20%;
  right: 2%;
}
.news-header .post-btn:hover {
  cursor: pointer;
  opacity: 0.7;
}
.news-header i::before {
  font-size: 1.5rem;
}
.news-body {
  overflow-x: hidden;
  overflow-y: auto;
  height: 230px;
}
.news-body::-webkit-scrollbar {
  width: 5px;
}
.news-body::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 10px;
}
.news-body table {
  table-layout: fixed;
  width: 100%;
}
.news-body table tr {
  cursor: pointer;
}
.news-body table tr:hover {
  background-color: rgba(0, 0, 0, 0.05);
}
.news-body table td {
  font-size: 0.9rem;
}
.news-body table .day {
  font-weight: 500;
  letter-spacing: 1px;
}
.news-body table .content {
  width: 80%;
  padding: 8px 10px 8px 0;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.no-news {
  height: 100%;
  margin: 0 5%;
  background: url("http://xs055583.xsrv.jp/storage/images/common/undraw_void_3ggu.svg");
  background-size: contain;
  background-repeat: no-repeat;
  font-size: 1.2rem;
  letter-spacing: 1px;
  color: #74828f;
  text-align: center;
}
.slide-right-enter-active,
.slide-left-enter-active {
  transition: 0.6s;
}
.slide-left-leave-active,
.slide-right-leave-active {
  display: none;
}

.slide-right-enter {
  transform: translateX(150%);
}

.slide-left-enter {
  transform: translateX(-150%);
}
@media (max-width: 575.5px) {
  .no-news {
    text-align: right;
  }
}
</style>
