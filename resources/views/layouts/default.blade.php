<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default/confirm.css') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  @yield('style')
  <title>@yield('title')</title>
</head>

<body>
  <div id="app">
    <header class="cf">
      <div class="cf">
        <div>
          <a href="{{ route('recipes.index') }}">
            <h1 class="logo">{{ $shop_name }}</h1></a>
        </div>
        <div class="user">
          <ul class="p-0 m-0">
            <li>
              <a href="{{ route('users.show',$user_id) }}">{{ $user_name }}</a>
            </li>
            <li>
              <a class="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                ログアウト
              </a>
            </li>
          </ul>
        </div>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

      <header-component :bookmarks="{{ $bookmarks }}" @can("isOwner") :is-owner="true" @endcan></header-component>
    </header>
    <loading-component></loading-component>
    @yield('content')
  </div>
  <script src=" {{ mix('js/app.js') }} "></script>
  <script>
  </script>
  @yield('script')
</body>


</html>
