<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/login.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <h1>
          <a href="/guest/home" class="a-logo"><i class="fa-solid fa-leaf"></i><p class="logo">RSV</p></a>
          <div class="page-title">
            @yield('pageTitle')
          </div>
        </h1>
        <div class="logout">
          <a href="/logout" class="a-logout">Logout</a>
        </div>
    </header>

    @yield('content')

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://kit.fontawesome.com/43405d8417.js" crossorigin="anonymous"></script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
