@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl mb-6">商品登録</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        <div class="mb-4">
            <label class="block mb-2">商品名 <span class="text-red-500">*</span></label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">価格 <span class="text-red-500">*</span></label>
            <input type="number" name="price" class="w-full border rounded px-3 py-2" min="0" max="10000" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">商品画像 <span class="text-red-500">*</span></label>
            <input type="file" name="image" accept="image/jpeg,image/png" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">季節 <span class="text-red-500">*</span></label>
            <div class="flex gap-4">
                @foreach($seasons as $season)
                    <label class="flex items-center">
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}" class="mr-2">
                        {{ $season->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-2">商品説明 <span class="text-red-500">*</span></label>
            <textarea name="description" class="w-full border rounded px-3 py-2" maxlength="120" required></textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded">登録</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded">戻る</a>
        </div>
    </form>
</div>
@endsection