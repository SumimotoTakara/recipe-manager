@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_create.css') }}">
@endsection

@section('title')
料理新規登録
@endsection

@section('content')
<main>
  <form enctype="multipart/form-data" ref="newRecipeAddition" action="{{ route('recipes.store') }}" method="POST"
    class="mx-auto mt-3 pb-5">
    @csrf
    <div class="img-form form-group mx-auto">
      <label for="img">画像</label>
      <img v-show="imageData" :src="imageData" alt="" class="preview" />
      <div>
        <input v-on:change="onFileChange" type="file" name="image" autocomplete="off" accept="image/*" />
      </div>
      @error('image')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group name-form mx-auto">
      <label for="recipe_name">料理名</label>
      <input type="text" name="recipe_name" class="form-control @error('recipe_name') is-invalid @enderror" id="name"
        value="{{ old('recipe_name') }}" placeholder="20文字以内" autofocus />
      @error('recipe_name')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group category-form mx-auto">
      <label for="category">カテゴリ</label>
      <select name="category" class="custom-select @error('category') is-invalid @enderror" id="category">
        <option value="" class="hidden">選択してください</option>
        <option value="salad" @if(old("category")==="sslad" )selected @endif>サラダ</option>
        <option value="meat" @if(old("category")==="meat" )selected @endif>お肉</option>
        <option value="fried" @if(old("category")==="fried" )selected @endif>揚げ物</option>
        <option value="dessert" @if(old("category")==="dessert" )selected @endif>デザート</option>
      </select>
      @error('category')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group description-form mt-3">
      <label for="description">説明</label>
      <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
        rows="20" placeholder="2000文字以内">{{ old("description") }}</textarea>
      @error('description')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <button v-on:click.prevent="submitRecipePosts" class="d-block mx-auto mt-5 btn btn-lg btn-primary">
      新規作成
    </button>
  </form>
</main>
@endsection

@section('script')
<script>
  new Vue({
    el: "#app",
    data:{
      imageData: "",
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
      submitRecipePosts(){
        this.$refs.newRecipeAddition.submit();
      },
    },
  });
</script>
@endsection
