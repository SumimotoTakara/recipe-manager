@extends("layouts.app")

@section("style")

@endsection
<link rel="stylesheet" href="{{ asset("/css/errors/error.css") }}">
@section("title")
404 エラー
@endsection


@section("header-link")
<a class="navbar-brand" href="{{ url("/") }}">
  RecipeManager
</a>
@endsection


@section("content")
<main>
  <div class="code">404</div>
  <div class="message">ページが見つかりません</div>
  <div class="sub-message">リンクに問題があるか、ページが削除された可能性があります</div>
  <div>
    <button type="button" onclick="history.back()" class="btn btn-lg btn-outline-success mt-3">戻る</button>
  </div>
</main>
@endsection
