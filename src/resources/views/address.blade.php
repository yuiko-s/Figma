@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="address-form__content">
  <h2>住所の変更</h2>

  <form action="{{ route('purchase.address.store', $item->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label>郵便番号</label>
      <input type="text" name="postal_code" value="{{ old('postal_code', $address['postal_code']) }}" required>
    </div>
    <div class="form-group">
      <label>住所</label>
      <input type="text" name="shippingaddress" value="{{ old('shippingaddress', $address['shippingaddress']) }}" required>
    </div>
    <div class="form-group">
      <label>建物名</label>
      <input type="text" name="building_name" value="{{ old('building_name', $address['building_name']) }}">
    </div>
    <button type="submit" class="btn btn-primary">更新する</button>
  </form>
</div>
@endsection
