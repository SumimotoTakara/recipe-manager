@extends("layouts.app")

@section("style")
<link rel="stylesheet" href="{{ asset("/css/user/user_show.css") }}">
@endsection

@section("title")
{{ $user->name }}
@endsection


@section("header-link")
@if($user->shopUser)
<a class="navbar-brand" href="{{ route("recipes.index") }}">
  {{ $shop_name }}
</a>
@else
<a class="navbar-brand" href="{{ url("/") }}">
  RecipeManager
</a>
@endif
@endsection


@section("content")
<div>
  <div class="user-box bg-light container">
    <div class="profile-box">
      <div class="image-box">
        <img v-on:click="edit('image')"
          src="{{ 'http://xs055583.xsrv.jp/storage/images/profile_images/'.$user->profile_image }}" alt=""
          v-on:error="onError" />
      </div>
      <div class="name-box">
        <p v-on:click="edit('name')" class="name">{{ $user->name }}</p>
      </div>
    </div>
    @if ($user->shopUser)
    <div class="row info-box bg-light">
      <div class="shop-name col-sm border">
        {{ $shop_name }}
      </div>
      <div class="position col-sm border">
        {{ $position }}
      </div>

      <div class="col-12">
        <button v-on:click="cofirmDeletion('{{ $position }}')" type="button" class="btn btn-lg btn-outline-danger mt-5">
          退会する
        </button>
      </div>
    </div>
    @endif
  </div>
  <profile-edit-component :show="editShow" :user="{{ $user }}" :edit-type="editType" :csrf="csrf" v-on:close="close">
  </profile-edit-component>
  @if ($user->shopUser)
  <form ref="shopUserDeletion" action="{{ route("shopusers.destroy",$user->shopUser->id) }}" method="POST">
    @csrf
    @method("DELETE")
  </form>
  @endif
</div>


@endsection

@section("script")
<script>
  new Vue({
  el: "#app",
  data: {
    csrf: document
    .querySelector("meta[name='csrf-token']")
    .getAttribute("content"),
    editShow: false,
    editType: "",
  },
  methods: {
    edit(type){
      this.editShow = true;
      this.editType = type;
    },

    close() {
      this.editShow = false;
      this.editType = "";
    },
    cofirmDeletion(position){
      let that = this;
      let confirmMessage = "お店から退会してよろしいですか？"
      if(position === "owner"){
        confirmMessage ="お店も削除されます。よろしいですか？"
      }
      this.$dialog
        .confirm(
          {
            title: "確認",
            body: confirmMessage,
          },
          {
            okText: "はい",
            cancelText: "キャンセル",
          }
        )
        .then(function() {
          that.submitDeletion();
        })
    },
    submitDeletion(){
      this.$refs.shopUserDeletion.submit();
    },
  },
});
</script>
@endsection
