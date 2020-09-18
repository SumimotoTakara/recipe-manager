@extends("layouts.app")

@section("title")
RecipeManager
@endsection

@section("header-link")
<a class="navbar-brand" href="{{ url("/") }}">
  RecipeManager
</a>
@endsection


@section("content")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header mb-3">
          <p class="d-inline-block mb-0">お店を作る</p>
          <a href="{{ route("shopusers.create") }}" class="ml-3">お店に参加しますか？</a>
        </div>

        <div class="text-center mt-2">
          <a href="{{ route("users.show",$user->id) }}" class="text-center d-inline-block">{{ $user->name }}さん!!</a>
          <span class="d-inline-block">あなたのお店の名前とShopIDを設定してください</span>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route("shops.store") }}">
            @csrf
            <div class="form-group row">
              <label for="shop_name" class="col-md-4 col-form-label text-md-right">ショップネーム</label>
              <div class="col-md-6">
                <input id="text" class="form-control @error("shop_name") is-invalid @enderror" name="shop_name"
                  value="{{ old("shop_name") }}" placeholder="10文字以内" required autocomplete="off" autofocus>
                @error("shop_name")
                <span class="text-danger" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="shop_auth_id" class="col-md-4 col-form-label text-md-right">ショップID</label>
              <div class="col-md-6">
                <input id="text" class="form-control @error(" shop_auth_id") is-invalid @enderror" name="shop_auth_id"
                  value="{{ old("shop_auth_id") }}" placeholder="半角英数字のみ 6~10文字" required autocomplete="off">
                @error("shop_auth_id")
                <span class="text-danger" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  作成
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
