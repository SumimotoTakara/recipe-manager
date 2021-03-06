@extends('layouts.app')

@section('title')
RecipeManager
@endsection


@section('header-link')
<a class="navbar-brand" href="{{ url('/') }}">
  RecipeManager
</a>
@endsection


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ログイン</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
              <div class="col-md-6">
                <input id="text" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-danger" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-danger" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    次回から省略
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  ログイン
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  パスワードをお忘れですか？
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-white mt-5">
        <p class="font-weight-bold text-success">シーティングされたデータにアクセスしていただくために</p>
        <p class="font-weight-bold">レストランAのオーナー</p>
        <p>メールアドレス:owner-a@test.com</p>
        <p>パスワード:ownerowner</p>
        <p class="font-weight-bold">レストランAのスタッフ</p>
        <p>メールアドレス:staff1@test.com</p>
        <p>パスワード:staffstaff1</p>
      </div>
    </div>
  </div>
</div>


@endsection
