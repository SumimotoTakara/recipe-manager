<template>
  <div class="container content-box mt-5">
    <transition-group name="slide-x" tag="div" class="row">
      <div
        class="recipe col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5"
        v-for="recipe in matchRecipes"
        :key="recipe.id"
      >
        <a :href="'/recipes/' + recipe.id">
          <div
            class="recipe-box bg-light"
            :class="matchLabelColor(recipe.category)"
          >
            <img
              :src="
                'http://xs055583.xsrv.jp/storage/images/dishes/' + recipe.image
              "
              alt=""
              @error="onError"
            />
            <div class="p-2 text">
              <h3 class="name mb-2">{{ recipe.name }}</h3>
              <div class="description">
                {{ recipe.description }}
              </div>
            </div>
          </div>
        </a>
      </div>
    </transition-group>
    <div class="more-box">
      <transition name="fade">
        <button
          v-show="recipes.length > loadNum"
          @click="loadMore"
          class="more-btn"
        >
          MORE
        </button>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  props: ["recipes", "category", "keyword"],
  data() {
    return {
      labelColors: [
        { category: "salad", class: "salad-label" },
        { category: "meat", class: "meat-label" },
        { category: "fried", class: "fried-label" },
        { category: "dessert", class: "dessert-label" },
      ],
      loadNum: 18,
    };
  },
  watch: {
    keyword() {
      this.resetLoadNum();
    },
    category() {
      this.resetLoadNum();
    },
  },
  computed: {
    matchRecipes() {
      let result = this.recipes.slice();
      // カテゴリ検索
      if (this.category.length > 0) {
        result = result.filter((r) => {
          return r.category.indexOf(this.category) > -1;
        });
      }
      // キーワード検索
      if (this.keyword.length > 0) {
        result = result.filter((r) => {
          return r.name.indexOf(this.keyword) > -1;
        });
      }
      
      if (result.length > this.loadNum) {
        result = result.slice(0, this.loadNum);
      } else {
        this.loadNum = this.recipes.length;
      }
      return result;
    },
  },
  methods: {
    loadMore() {
      if (this.recipes.length > this.loadNum + 3) {
        this.loadNum += 3;
      } else {
        this.loadNum = this.recipes.length;
      }
    },
    resetLoadNum() {
      this.loadNum = 18;
    },
    matchLabelColor(value) {
      let result = [];
      result = this.labelColors.slice();
      result = result.filter((r) => {
        return r.category.indexOf(value) > -1;
      });
      return result[0].class;
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 100%;
  padding: 0 30px;
  position: relative;
}
a:hover {
  text-decoration: none;
}
.recipe-box {
  height: 300px;
  overflow: hidden;
  border-radius: 8px;
  text-decoration: none;
  color: #43484d;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.5);
  transition: all 0.5s;
  position: relative;
}
.recipe-box::before {
  content: "";
  bottom: 0;
  right: 0;
  border-top: 2.5rem solid transparent;
  border-right: 2.5rem solid;
  position: absolute;
}
.salad-label::before {
  border-right-color: #76c047;
}
.meat-label::before {
  border-right-color: #ffc0cb;
}
.fried-label::before {
  border-right-color: #fff100;
}
.dessert-label::before {
  border-right-color: #c1efff;
}

.recipe-box:hover {
  text-decoration: none;
  color: #43484d;
  opacity: 0.6;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.9);
}
.recipe-box h3 {
  font-size: 1.3rem;
}
.recipe-box img {
  object-fit: cover;
  display: block;
  width: 100%;
  height: 40%;
}

.recipe-box .description {
  height: 165px;
}

.slide-x-enter-active {
  animation: slide-x-in 0.6s;
}
.slide-x-leave-active {
  animation: slide-x-in 0.6s reverse;
}
.slide-x-leave,
.slide-x-leave-to {
  display: none;
}

.slide-x-move {
  transition: transform 0.6s;
}

.more-box {
  position: absolute;
  bottom: -50px;
  left: 0;
  width: 100%;
}
.more-box button {
  display: block;
  margin: 0 auto;
}
.more-btn{
  background:#1F6ED4;
  color:#fff;
  border:none;
  position:relative;
  width: 200px;
  height: 50px;
  font-size:1rem;
  cursor:pointer;
  transition:800ms ease all;
  outline:none;
}
.more-btn:hover{
  background:#e4e7f5;
  color:#1F6ED4;
}
.more-btn:before,.more-btn:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background: #1F6ED4;
  transition:400ms ease all;
}
.more-btn:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.more-btn:hover:before,.more-btn:hover:after{
  width:100%;
  transition:800ms ease all;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.6s;
}

@keyframes slide-x-in {
  from {
    transform: translateX(-600%);
  }

  to {
    transform: translateX(0%);
  }
}
@media (max-width: 899px) {
  .recipe-box {
    height: 300px;
  }
  .recipe-box img {
    height: 55%;
  }
}
</style>
