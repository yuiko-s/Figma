@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="profile">
  <img
    class="profile__avatar"
    src="{{ $user->image ? Storage::url($user->image) : asset('images/default-avatar.png') }}"
    alt="{{ $user->name }}"
  >
  <h1 class="profile__name">{{ $user->name }}</h1>

  <div class="mypageprofile__link">
    <a class="mypageprofile__button-submit" href="/mypage/profile">プロフィールを編集</a>
  </div>
</div>

{{-- タブ --}}
<nav class="tabs" role="tablist">
  <a
    href="{{ route('mypage', ['tab' => 'sell']) }}"
    class="tabs__item {{ $tab === 'sell' ? 'is-active' : '' }}"
    aria-current="{{ $tab === 'sell' ? 'page' : 'false' }}"
  >
    出品した商品
  </a>

  <a
    href="{{ route('mypage', ['tab' => 'buy']) }}"
    class="tabs__item {{ $tab === 'buy' ? 'is-active' : '' }}"
    aria-current="{{ $tab === 'buy' ? 'page' : 'false' }}"
  >
    購入した商品
  </a>
</nav>

{{-- 一覧 --}}
<div class="item-list">
    @forelse ($items as $item)
        <div class="item-card">
            <a href="{{ route('items.show', ['id' => $item->id]) }}" class="item-card__image">
                <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}">
            </a>
            <div class="item-card__info">
                <h2 class="item-card__name">{{ $item->name }}</h2>
            </div>
        </div>
        @empty
            <p>商品がありません。</p>
        @endforelse
</div>
{{ $items->withQueryString()->links() }}
@endsection
