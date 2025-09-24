@extends('layouts.app')

@section('title', $item->name)

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="item-detail">
    {{-- 左側：商品画像 --}}
    <div class="item-detail__image">
        <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}">
    </div>
    <div class="item-detail__info">
        <h1 class="item-detail__name">{{ $item->name }}</h1>
        @if(!empty($item->brand))
        @endif
        <p class="item-detail__price">￥{{ number_format($item->price) }}(税込)</p>

        
    {{-- 支払い方法 --}}
    <form class = "paymentmethod">
        <select name="select">
            <option value="コンビニ払い">コンビニ払い</option>
            <option value="カード払い">カード払い</option>
        </select>
    </form>

    {{-- 配送先 --}}

     {{-- 右側：商品情報 --}}

        <form action="{{ route('purchase.store', $item->id) }}" method="POST">
        @csrf
        <button class="item-detail__button" type="submit">購入する</button>

            
        </form>
    </div>
</div>
@endsection

