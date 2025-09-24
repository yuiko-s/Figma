@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

 <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>プロフィール設定</h2>
      </div>
      <form class="form">
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ユーザー名</span>
            
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name"/>
            </div>
            <div class="form__error">
              <!--バリデーション-->
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
            
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="postal_code"/>
            </div>
            <div class="form__error">
              <!--バリデーション。-->
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" />
            </div>
            <div class="form__error">
              <!--バリデーション-->
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input name="text" name="building">
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">更新する</button>
        </div>

@endsection