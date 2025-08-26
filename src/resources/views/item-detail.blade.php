@extends('layouts.app')

@section('title', $item->name)

@section('css')
<link rel="stylesheet" href="{{ asset('css/item-detail.css') }}">
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
        <p class="item-detail__price">￥{{ number_format($item->price) }}</p>
        <form action="{{ route('cart.add', $item->id) }}" method="POST">
            @csrf
            <button class="item-detail__button" type="submit">購入手続きへ</button>
            <h2>商品説明</h2>
            <p class="item-detail__description">{{ $item->description }}</p>

            <h2>商品の情報</h2>
            <p class="item-detail__info">{{ $item->info }}</p>
        
            
        </form>
    </div>
</div>
@endsection
