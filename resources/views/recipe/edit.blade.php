@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_create.css') }}">
@endsection

@section('title')
編集ページ&nbsp;[{{ $recipe->name }}]
@endsection

@section('content')
<main>
  <form enctype="multipart/form-data" ref="recipeUpdates" action="{{ route('recipes.update',$recipe->id) }}"
    method="POST" class="mx-auto mt-3 pb-5">
    @csrf
    @method("PUT")
    <div class="img-form form-group mx-auto">
      <label for="img">画像</label>
      <img v-show="imageData" :src="imageData" alt="">
      <img v-show="!imageData" src="{{ 'http://xs055583.xsrv.jp/storage/images/dishes/'.$recipe->image }}" alt="">
      <div>
        <input v-on:change="onFileChange" ref="image" type="file" name="image" autocomplete="off" accept="image/*" />
      </div>
      <button v-show="imageData" v-on:click.prevent="clear" class="btn btn-sm btn-success mt-2">画像を元に戻す</button>
      @error('image')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group name-form mx-auto">
      <label for="recipe_name">料理名</label>
      <input type="text" name="recipe_name" class="form-control @error('recipe_name') is-invalid @enderror" id="recipe_name"
        value="{{ $recipe->name }}" placeholder="20文字以内" />
      @error('recipe_name')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group category-form mx-auto">
      <label for="category">カテゴリ</label>
      <select name="category" class="custom-select @error('category') is-invalid @enderror" id="category">
        <option value="" class="hidden">選択してください</option>
        <option v-for="c in categorys" :value="c.category" :key="c.category"
          :selected="c.category === '{{ $recipe->category }}'">
          @{{ c.name }}</option>
      </select>
      @error('category')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group description-form mt-3">
      <label for="description">内容</label>
      <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
        rows="20" placeholder="200文字以内">{{ $recipe->description}} </textarea>
      @error('description')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <button v-on:click="submitUpdates" type="button" class="d-block w-25 mx-auto mt-5 btn btn-lg btn-primary">
      編集
    </button>
  </form>
</main>
@endsection

@section('script')
<script>
  new Vue({
    el: "#app",
    data:{
      categorys:[
      {category:"salad", name:"サラダ"},
      {category:"meat", name:"お肉"},
      {category:"fried", name:"揚げ物"},
      {category:"dessert", name:"デザート"},
      ],
      imageData:"",
    },
    methods: {
      onFileChange(e) {
        let files = e.target.files;
        if (files.length > 0) {
        let file = files[0];
        let reader = new FileReader();
        reader.onload = (e) => {
          this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
        }
      },
      clear(){
        this.imageData = "";
        this.$refs.image.value = "";
      },
      submitUpdates(){
        this.$refs.recipeUpdates.submit();

      },
    },
  });
</script>
@endsection
