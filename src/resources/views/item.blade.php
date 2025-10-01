@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="item-list">
    @forelse ($items as $item)
        <div class="item-card">
            <a href="{{ route('items.show', ['id' => $item->id]) }}" class="item-card__image">
                <img src="{{ \Storage::url($item->image) }}" alt="{{ $item->name }}">
                @if ($item->is_sold)
                    <span class="item-card__badge">SOLD OUT</span> 
                @endif
            </a>
            <div class="item-card__info">
                <h2 class="item-card__name">{{ $item->name }}</h2>
            </div>
        </div>
        @empty
            <p>商品がありません。</p>
        @endforelse
</div>
@endsection
