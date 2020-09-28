@extends('layouts.app')

@section('head')
<title>{{ $category->name }}</title>
<meta name="description" content="{{ $category->description }}">
<meta name="keywords" content="{{ $category->name }}, {{ $category->title }}">
@endsection

@section('content')
<main class="main">
  <section class="section" id="buy_box1">
    <div class="container">
      <h2 class="section__title">{{ $category->title }}</h2>
      <p class="section__subtitle">{{ $category->description }}</p>
      @if(count($category->products))
      <div class="row">
        @foreach($category->products as $product)
        @include('category.product')
        @endforeach
      </div>
      @endif
    </div>
  </section>
</main>
@endsection