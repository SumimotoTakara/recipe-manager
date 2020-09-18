<template>
  <div class="recipe-box mt-3 p-4 bg-light">
    <h2 class="title text-center">{{ recipe.name }}</h2>
    <span class="category" :id="recipe.category">{{ recipe.category }}</span>
    <img
      :src="'http://xs055583.xsrv.jp/storage/images/dishes/' + recipe.image"
      alt=""
    />
    <div class="description-box bg-white mt-3 border rounded">
      <h3 class="border-bottom">説明</h3>
      <div class="description">{{ recipe.description }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["recipe"],
  data() {
    return {
      category: ["salad", "meat", "fried", "dessert"],
    };
  },
};
</script>

<style scoped>
.recipe-box {
  width: 80%;
  margin: 0 auto;
}
h2 {
  font-size: 2rem;
}
.category {
  display: block;
  margin: 0 auto;
  width: 80%;
  color: darkgray;
  font-size: 1.3rem;
  font-weight: 600;
  letter-spacing: 1.5px;
  padding: 3px;
}
#salad {
  background-color: #76c04760;
}
#meat {
  background-color: #ffc0cb60;
}
#fried {
  background-color: #fff10050;
}
#dessert {
  background-color: #c1efff80;
}
img {
  display: block;
  margin: 0 auto;
  margin-top: 10px;
  max-height: 500px;
  width: auto;
}
.description-box {
  width: 90%;
  margin: 0 auto;
  min-height: 400px;
}
.description-box h3 {
  font-size: 1.3rem;
}
.description {
  padding: 5px 10px 5px;
  letter-spacing: 0.5px;
}

.description-box .description {
  white-space: pre-wrap;
}
@media (max-width: 575.5px) {
  .recipe-box {
    width: 100%;
  }
  .category {
    width: 100%;
  }
}
</style>
