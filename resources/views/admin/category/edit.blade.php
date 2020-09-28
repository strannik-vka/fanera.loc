@extends('admin.global.app')

@section('title', 'Редактирование')

@section('content')
<div class="container my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('admin.category.index') }}">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
        </ol>
    </nav>
    
    @include('admin.global.errors')
    <form enctype="multipart/form-data" action="{{ Route('admin.category.update', $category) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('admin.category.form')
    </form>
</div>
@endsection