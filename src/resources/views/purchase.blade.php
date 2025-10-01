@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase">


  <div class="item-detail">
    <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}" class="item-image">
    <h3>{{ $item->name }}</h3>
    <p>金額: ￥{{ number_format($item->price) }}</p>
  </div>


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


    <div class="address-info">
      <h4>配送先</h4>
      <p>
        〒{{ $address['postal_code'] }}<br>
        {{ $address['shippingaddress'] }} {{ $address['building_name'] }}
      </p>
      <a href="{{ route('purchase.address.form', $item->id) }}">変更する</a>
    </div>

 
    <div class="subtotal">
      <p>商品代金: ￥{{ number_format($item->price) }}</p>
      <p>支払い方法: 選択したものが確定時に表示されます</p>
    </div>

  
    <button type="submit" class="btn btn-primary">購入する</button>
  </form>
    <script>
  (function () {
    var select = document.getElementById('paymentmethod');
    if (!select) return;

    var targetP = null;
    document.querySelectorAll('.subtotal p').forEach(function(p){
      var t = (p.textContent || '').trim();
      if (t.startsWith('支払い方法')) targetP = p;
    });
    if (!targetP) return;

    function update() {
      var v = (select.value || '未選択').trim();
      targetP.textContent = '支払い方法: ' + v;
    }

    update();
    select.addEventListener('change', update);
  })();
</script>
 
</div>
@endsection
