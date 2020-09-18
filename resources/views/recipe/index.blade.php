@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_index.css') }}">
@endsection

@section('title')
RecipeManager
@endsection

@section('content')
<main class="pt-3">
  <div class="search-box input-group mb-2">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
    </div>
    <input v-model.trim="keyword" type="text" class="form-control" placeholder="キーワードを入力して検索">
    <div class="input-group-append">
      <button type="button" v-show="keyword" v-on:click="cleartKeyword"
        class="btn clear-btn input-group-text bg-white"><i class="fas fa-times"></i></button>
    </div>
  </div>
  <section>
    <h1 class="hidden">CATEGORY_＆_NEWS</h1>
    <div class="grid nav-news mt-5">

      <section class="nav">
        <h2 class="hidden">CATEGORY</h2>
        <nav-component v-model="category" v-on:select-out="clearCategory"></nav-component>
      </section>

      <section class="news bg-light">
        <h2 class="hidden">NEWS</h2>
        <news-group-component :this-month-news="{{ $this_month_news }}" :last-month-news="{{ $last_month_news }}"
          :csrf="csrf" @can("isOwner") :is-owner="true" @endcan>
        </news-group-component>
      </section>
    </div>
  </section>

  <section>
    <h1 class="hidden">CONTENTS</h1>
    <recipe-group-component ref="recipeGroup" :recipes="{{ $recipes }}" :category="category" :keyword="keyword">
    </recipe-group-component>
  </section>
</main>
@endsection

@section('script')
<script>
  new Vue({
  el: "#app",
  data: {
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    category: "",
    keyword:"",
  },
  methods: {
    cleartKeyword(){
      this.keyword ="";
    },
    clearCategory() {
      this.category = "";
    },
  },
});
</script>
@endsection
