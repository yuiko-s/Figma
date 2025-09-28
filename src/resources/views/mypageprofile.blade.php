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
    @method('PUT')

    <img
      id="avatarPreview"
      class="profile__avatar"
      src="{{ $user->image ? Storage::url($user->image) : asset('images/default-avatar.png') }}"
      alt="{{ $user->name }}"
    >

    <div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">画像を選択する</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--text">
      {{-- input を隠して label をボタン化 --}}
      <input type="file" name="image" id="image" accept="image/*" class="visually-hidden" />
      <label for="image" class="file-select-btn">画像を選択する</label>
      <span id="image-filename" class="file-name"></span>
    </div>
    <div class="form__error">
      @error('image'){{ $message }}@enderror
    </div>
  </div>
</div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">ユーザー名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" value="{{ old('name', $user->name) }}" />
        </div>
        <div class="form__error">
          @error('name'){{ $message }}@enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" />
        </div>
        <div class="form__error">
          @error('postal_code'){{ $message }}@enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" value="{{ old('address', $user->address) }}"/>
        </div>
        <div class="form__error">
          @error('address'){{ $message }}@enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          {{-- type="building" は存在しないので text に修正 --}}
          <input type="text" name="building" value="{{ old('building', $user->building) }}"/>
        </div>
        <div class="form__error">
          @error('building'){{ $message }}@enderror
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">更新する</button>
    </div>
  </form>
</div>

</script>
@endsection
