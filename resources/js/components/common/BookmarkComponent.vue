<template>
  <div>
    <transition
      name="accordion"
      @before-enter="beforeEnter"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
    >
      <div class="bookmark-box border" v-if="bookmarkShow">
        <ul v-if="bookmarks.length > 0">
          <li
            v-for="bookmark in bookmarks"
            :key="bookmark.id"
            class="border-bottom"
          >
            <a :href="'/recipes/' + bookmark.recipe.id">
              {{ bookmark.recipe.name }}
            </a>
          </li>
        </ul>
        <p v-else>ブックマークがありません</p>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: {
    bookmarks: {
      type: Array,
    },
    bookmarkShow: {
      type: Boolean,
    },
    csrf: {
      type: String,
    },
  },
  methods: {
    beforeEnter: function(el) {
      el.style.height = "0px";
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + "px";
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + "px";
    },
    leave: function(el) {
      el.style.height = "0px";
    },
  },
};
</script>

<style scoped>
.bookmark-box {
  overflow: hidden;
  transition: 0.5s ease-in-out;
  background-color: white;
  box-shadow: rgba(0, 0, 0, 0.9);
  position: absolute;
  width: 30%;
  top: 100%;
  right: 0;
  z-index: 2;
}
.bookmark-box ul {
  margin: 0;
  padding: 5px 0px 3px 15px;
}
.bookmark-box li {
  list-style: none;
  font-size: 1rem;
  text-overflow: ellipsis;
  white-space: nowrap;
  padding: 5px 0;
}
.bookmark-box li a {
  display: block;
  font-size: 0.8rem;
}
.bookmark-box p {
  font-size: 1rem;
}
.bookmark-box .delete {
  cursor: pointer;
  color: #43484d;
}
.accordion-body {
  overflow: hidden;
  transition: 1s ease-in-out;
}
@media (max-width: 899px) {
  .bookmark-box li,
  .bookmark-box p {
    font-size: 0.9rem;
  }
  .bookmark-box {
    width: 45%;
  }
}
</style>
