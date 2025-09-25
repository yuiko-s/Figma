@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase">

  {{-- 商品情報 --}}
  <div class="item-detail">
    <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}" class="item-image">
    <h3>{{ $item->name }}</h3>
    <p>金額: ￥{{ number_format($item->price) }}</p>
  </div>

  {{-- 支払い方法選択 --}}
  <form action="{{ route('purchase.store', $item->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="paymentmethod">支払い方法</label>
      <select id="paymentmethod" name="paymentmethod" required>
        @foreach ($paymentOptions as $opt)
          <option value="{{ $opt }}">{{ $opt }}</option>
        @endforeach
      </select>
    </div>

    {{-- 配送先情報 --}}
    <div class="address-info">
      <h4>配送先</h4>
      <p>
        〒{{ $address['postal_code'] }}<br>
        {{ $address['shippingaddress'] }} {{ $address['building_name'] }}
      </p>
      <a href="{{ route('purchase.address.form', $item->id) }}">変更する</a>
    </div>

    {{-- 小計情報 --}}
    <div class="subtotal">
      <p>商品代金: ￥{{ number_format($item->price) }}</p>
      <p>支払い方法: 選択したものが確定時に表示されます</p>
    </div>

    {{-- 購入ボタン --}}
    <button type="submit" class="btn btn-primary">購入確定</button>
  </form>
</div>
@endsection
