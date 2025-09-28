<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Furima')</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>
<body>
<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="{{ url('/') }}">
            <img src="{{ asset('storage/img/logo.svg') }}" alt="COACHTECH" />
        </a>

        <form class="search-form" method="GET" action="{{ route('items.index') }}">
            <div class="search-form__item-input">
                <input
                    type="search"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="商品を検索"
                    aria-label="検索">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>

        <nav class="header__nav">
            <ul class="header__nav-list">
                @guest
                <li class="header__nav-item">
                    <a class="header__link" href="{{ route('login') }}">ログイン</a>
                </li>
                @if (Route::has('register'))
                <li class="header__nav-item">
                <a class="header__link" href="{{ route('register') }}">会員登録</a>
                </li>
                @endif
                @endguest

                @auth
                @if (Auth::check())
                <li class="header__nav-item">
                    <a class="header__link" href="{{ route('mypage') }}">マイページ</a>
                </li>
                <li class="header__nav-item">
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <button button class="header__link button--link" type="submit">ログアウト</button>
                    </form>
                </li>
                @endif
                <li class="header__nav-item">
                    <a class="button button--primary" href="{{ route('sell') }}">出品</a>
                </li>
                
                @endauth
            </ul>
        </nav>

    </div>
</header>

<main class="main">
    @yield('content')
</main>

@yield('scripts')
</body>
</html>
