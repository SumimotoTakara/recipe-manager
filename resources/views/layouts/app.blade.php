<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/default/confirm.css') }}">
  @yield('style')
  <title>@yield('title')</title>
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <style>
    #app {
      min-height: 100vh;
      color: #43484d;
      background-color: #e4e7f5;
      font-family: "M PLUS Rounded 1c", sans-serif;
      font-family: "Noto Sans JP", sans-serif;
    }

    a:hover {
      text-decoration: none !important;
    }
  </style>
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        {{-- ショップに属しているかどうかで、リンク先を変える --}}
        @yield('header-link')

        <div class="d-inline-block float-right">
          <ul class="navbar-nav ">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
            </li>
            @endif
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
    <loading-component></loading-component>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
  @yield('script')
</body>

</html>
