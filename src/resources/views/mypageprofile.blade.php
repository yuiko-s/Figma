@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypageprofile.css') }}">
@endsection

@section('content')
<div class="mypageprofile-form__content">
  <div class="mypageprofile-form__heading">
    <h2>プロフィール設定</h2>
  </div>

  <form class="form" action="/mypage/profile" method="post" enctype="multipart/form-data">
    @csrf

    {{-- 現在の画像を表示（なければデフォルト） --}}
    <img
      id="avatarPreview"
      class="profile__avatar"
      src="{{ ($profile && $profile->image) ? Storage::url($profile->image) : asset('images/default-avatar.png') }}"
      alt="{{ $profile->name ?? $user->name }}"
    >

    {{-- 画像アップロード --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">画像を選択する</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="file" name="image" id="image" accept="image/*" class="visually-hidden" />
          <label for="image" class="file-select-btn">画像を選択する</label>
          <span id="image-filename" class="file-name"></span>
        </div>
        <div class="form__error">@error('image'){{ $message }}@enderror</div>
      </div>
    </div>

    {{-- ユーザー名 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">ユーザー名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name"
                 value="{{ old('name', $user->name) }}" />
        </div>
        <div class="form__error">@error('name'){{ $message }}@enderror</div>
      </div>
    </div>

    {{-- 郵便番号 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="postal_code"
                 value="{{ old('postal_code', optional($profile)->postal_code ?? $user->postal_code) }}" />
        </div>
        <div class="form__error">@error('postal_code'){{ $message }}@enderror</div>
      </div>
    </div>

    {{-- 住所 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address"
                 value="{{ old('address', optional($profile)->address ?? $user->address) }}" />
        </div>
        <div class="form__error">@error('address'){{ $message }}@enderror</div>
      </div>
    </div>

    {{-- 建物名 --}}
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building"
                 value="{{ old('building', optional($profile)->building ?? $user->building) }}" />
        </div>
        <div class="form__error">@error('building'){{ $message }}@enderror</div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">更新する</button>
    </div>
  </form>
</div>

<script>
  (function () {
    var input = document.getElementById('image');
    var nameOut = document.getElementById('image-filename');
    var preview = document.getElementById('avatarPreview');
    if (!input) return;

    input.addEventListener('change', function (e) {
      var f = e.target.files && e.target.files[0];
      if (!f) return;
      if (nameOut) nameOut.textContent = f.name;
      if (preview && f.type.startsWith('image/')) {
        var url = URL.createObjectURL(f);
        preview.src = url;
      }
    });
  })();
</script>
@endsection
