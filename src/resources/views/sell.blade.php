@extends('layouts.app')

@section('title','商品の出品')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">

@endsection

@section('content')
<div class="sell-form__content">
  <div class="sell-form__heading"><h2>商品の出品</h2></div>

  <form class="form" action="{{ route('sell.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form__group">
  <div class="form__group-title"><span class="form__label--item">商品画像</span></div>
  <div class="form__group-content">
    <div class="form__input--file">
      <input type="file" name="image" id="image" accept="image/*" class="visually-hidden">
      <label for="image" class="file-select-btn">画像を選択する</label>
      <span id="image-filename" class="file-name"></span>
    </div>
    <div class="form__error">@error('image'){{ $message }}@enderror</div>
  </div>
</div>


    {{-- カテゴリー（チップ選択） --}}
@php
  $categories = ['ファッション','家電','インテリア','レディース','メンズ','コスメ','本','ゲーム','スポーツ','キッチン','ハンドメイド','アクセサリー','おもちゃ','ベビー・キッズ'];
@endphp
<h3 class="form-section-title">商品の詳細</h3>
<div class="form__group">
  <div class="form__group-title"><span class="form__label--item">カテゴリー</span></div>
  <div class="form__group-content">
    <div class="form__input--chips">
      <div class="category-chips" role="radiogroup" aria-label="カテゴリーを選択">
        @foreach($categories as $cat)
          @php $id = 'cat-'.md5($cat); @endphp
          <input
            type="radio"
            name="category"
            id="{{ $id }}"
            value="{{ $cat }}"
            class="category-chip__radio"
            {{ old('category') === $cat ? 'checked' : '' }}
            @if($loop->first) required @endif
          >
          <label for="{{ $id }}" class="category-chip">{{ $cat }}</label>

        @endforeach
      </div>
    </div>
    <div class="form__error">@error('category'){{ $message }}@enderror</div>
  </div>
</div>


    <div class="form__group">
      <div class="form__group-title"><span class="form__label--item">商品の状態</span></div>
      <div class="form__group-content">
        <select name="condition" required>
          @foreach(['良好','目立った傷や汚れなし','やや傷や汚れあり','状態が悪い'] as $cond)
            <option value="{{ $cond }}" {{ old('condition')===$cond?'selected':'' }}>{{ $cond }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title"><span class="form__label--item">商品名</span></div>
      <div class="form__group-content">
        <input type="text" name="name" value="{{ old('name') }}" required>
      </div>
    </div>

    <h3 class="form-section-title">商品名と説明</h3>
    <div class="form__group">
      <div class="form__group-title"><span class="form__label--item">ブランド名</span></div>
      <div class="form__group-content">
        <input type="text" name="brand" value="{{ old('brand') }}">
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title"><span class="form__label--item">商品の説明</span></div>
      <div class="form__group-content">
        <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
      </div>
    </div>

  <div class="form__group">
  <div class="form__group-title"><span class="form__label--item">販売価格</span></div>
  <div class="form__group-content">
    <div class="form__input--text price-input">
      <input
        type="text"
        name="price"
        value="{{ old('price') }}"
        required
      >
    </div>
    <div class="form__error">@error('price'){{ $message }}@enderror</div>
  </div>
</div>



    <div class="form__button">
      <button class="form__button-submit" type="submit">出品する</button>
    </div>
  </form>
</div>
@endsection
