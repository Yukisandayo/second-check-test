@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <label for="image">商品画像:</label>
        <input type="file" name="image" id="image" accept=".jpg,.png">
        @if ($product->image)
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
        </div>
        @endif
        @error('image')
            <p class="error">{{ $message }}</p>
        @enderror
        <label for="name">商品名:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
        <label for="price">価格:</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">
        @error('price')
            <p class="error">{{ $message }}</p>
        @enderror
        <label for="season">季節:</label>
        <div>
            <label><input type="radio" name="season" value="春" {{ old('season', $product->season ?? '') == '春' ? 'checked' : '' }}> 春</label>
            <label><input type="radio" name="season" value="夏" {{ old('season', $product->season ?? '') == '夏' ? 'checked' : '' }}> 夏</label>
            <label><input type="radio" name="season" value="秋" {{ old('season', $product->season ?? '') == '秋' ? 'checked' : '' }}> 秋</label>
            <label><input type="radio" name="season" value="冬" {{ old('season', $product->season ?? '') == '冬' ? 'checked' : '' }}> 冬</label>
        </div>
        @error('season')
            <p class="error">{{ $message }}</p>
        @enderror
        <label for="description">商品説明:</label>
        <textarea name="description" id="description" rows="5">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">変更を保存</button>
    </form>
</div>