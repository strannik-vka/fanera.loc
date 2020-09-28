@extends('admin.global.app')

@section('title', 'Категории')

@section('content')
<div class="container mt-4">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
    </nav>

    <table class="table table-sm table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Картинка</th>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Позиция</th>
                <th scope="col">Статус</th>
                <th scope="col" class="text-right">
                    <a href="{{ Route('admin.category.create') }}">добавить</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($categories))
                @foreach($categories as $category)
                    @include('admin.category.item')
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center py-5">Ничего не найдено</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection