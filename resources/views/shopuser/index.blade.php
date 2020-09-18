@extends("layouts.default")

@section("style")
<link rel="stylesheet" href="{{ asset("css/shopuser/shopuser_index.css") }}">
@endsection

@section("title")
ユーザー一覧
@endsection

@section("content")
<main>
  <section>
    <h1 class="hidden">SHOP_USER_INDEX</h1>
    <div class="users-box bg-light mt-4">
      <shop-user-group-component :csrf="csrf" :shop-users="{{ $shop_users }}" :user-id="{{ $user_id }}"></shop-user-group-component>
    </div>
  </section>
</main>
@endsection

@section("script")
<script>
  new Vue({
    el:"#app",
    data:{
      csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    }
  })
</script>
@endsection
