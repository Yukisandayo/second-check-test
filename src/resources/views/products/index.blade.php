@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="products__content">
    <div class="content__header">
        <h2 class="content__logo">商品一覧</h2>
        <div class="create-form">
            <a href="products.create" class="create-form__button">＋商品を追加</a>
        </div>
    </div>
    <div class="product-items">
        <form class="search-form" method="get" action="/products/search">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="商品名で検索・・・">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
        <div class="product-list">
            <div class="products">
                @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>¥{{ $product->price }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection
