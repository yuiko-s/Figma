@extends('layouts.app')

@section('title', $item->name)

@section('css')
<link rel="stylesheet" href="{{ asset('css/item-detail.css') }}">
<style>
.like-star {
    background: none;
    border: none;
    padding: 0;
    margin: 0;
    font-size: 24px;
    line-height: 1;
    cursor: pointer;
}
.meta-row{
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 8px 0 16px;
    font-size: 14px;
    color: #555;
}
.meta-row .sep { color: #ccc; }

.comments {
    margin-top: 24px;
}
.comment {
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}
.comment__meta {
    font-size: 12px; color: #888; margin-bottom: 6px;
}
.comment__body {
    white-space: pre-wrap; line-height: 1.6;
}
.comment-form { margin-top: 12px; }
.comment-form textarea {
    width: 100%; min-height: 100px; padding: 10px;
    border: 1px solid #ddd; border-radius: 3px;
}
.comment-form button {
    margin-top: 8px; padding: 10px 12px;
    background: #eb6161; color: #fff; border: none; border-radius: 3px;
    cursor: pointer;
}
</style>
@endsection

@section('content')
<div class="item-detail">
    {{-- 左側：商品画像 --}}
    <div class="item-detail__image">
        <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}">
    </div>

    {{-- 右側：商品情報 --}}
    <div class="item-detail__info">
        <h1 class="item-detail__name">{{ $item->name }}</h1>
        @if(!empty($item->brand))
        <p class="item-detail__brand">{{ $item->brand }}</p>
        @endif
        <p class="item-detail__price">￥{{ number_format($item->price) }}(税込)</p>

        @auth
        <form method="POST" action="{{ route('items.like', $item) }}">
        @csrf
        <button type="submit">☆</button>
        <span>{{ $item->likes_count }}</span>
        <button type="submit">💬</button>
        <span>{{ $item->comments_count }}</span>
        </form>

        @else
        <a href="{{ route('login') }}">ログインしてお気に入り</a>
        @endauth

        <form action="{{ route('purchase', $item->id) }}" method="GET">
            <button class="item-detail__button" type="submit">購入手続きへ</button>
        </form>
        
        <h2>商品説明</h2>
        <p class="item-detail__description">{{ $item->description }}</p>

            <h2>商品の情報</h2>
            <p class="item-detail__info">{{ $item->info }}</p>

            
<div class="comments">
  <h2>コメント（{{ $item->comments->count() }}）</h2>

  @forelse($item->comments as $c)
    <div class="comment">
      <div class="comment__meta">
        {{ $c->user->name ?? 'ゲスト' }} ・ {{ $c->created_at->diffForHumans() }}
      </div>
      <div class="comment__body">{{ $c->comment }}</div>
    </div>
  @empty
    <p>まだコメントはありません。</p>
  @endforelse

  @auth
    <form class="comment-form" action="{{ route('items.comments.store', $item) }}" method="POST">
      @csrf
      <textarea name="comment" placeholder="商品へのコメントを入力…" required>{{ old('comment') }}</textarea>
      @error('comment') <div class="form__error">{{ $message }}</div> @enderror
      <button type="submit">コメントを送信</button>
    </form>
  @else
    <p><a href="{{ route('login') }}">ログインしてコメントする</a></p>
  @endauth
</div>

    </div>
</div>
@endsection
