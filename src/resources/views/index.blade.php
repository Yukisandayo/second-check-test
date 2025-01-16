@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="products__content">
    <div class="content__header">
        <h2 class="content__logo">商品一覧</h2>
        <form class="add-form">
        @csrf
            <div class="add-form__item">
                <button class="add-form__item-button" type="submit">＋商品を追加</button>
            </div>
    </form>
    </div>
    <form class="search-form">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="content">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
    </form>
    <div class="product-items"></div>
</div>
@endsection
