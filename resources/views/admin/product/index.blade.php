@extends('admin.global.app')

@section('title', 'Товары')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Товары</li>
        </ol>
    </nav>

    <table class="table table-sm table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Картинка</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Категория</th>
                <th scope="col">Позиция</th>
                <th scope="col">Статус</th>
                <th scope="col"><a class="float-right" href="{{ Route('admin.product.create') }}">добавить</a></th>
            </tr>
            <form>
                <tr>
                    <th>
                        <select name="images">
                            <option value="">- Выбрать -</option>
                            @foreach([1 => 'Есть', 2 => 'Нет'] as $id => $name)
                            <option {{ request()->images == $id ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input placeholder="Название или описание" type="text" name="name" class="form-control form-control-sm" value="{{ request()->name }}">
                    </th>
                    <th>
                        <input placeholder="Цена" type="text" name="amount" class="text-center form-control form-control-sm" value="{{ request()->amount }}">
                    </th>
                    <th>
                        <select name="category_id">
                            <option value="">- Выбрать -</option>
                            @foreach($categories_select as $item)
                            <option {{ request()->category_id == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <input placeholder="Позиция" type="text" name="sort" class="form-control form-control-sm" value="{{ request()->sort }}">
                    </th>
                    <th>
                        <select name="status">
                            @foreach(['Включен' => 0, 'Отключен' => 1] as $name => $value)
                            <option {{ 
                                request()->status == $value ? 'selected' : '' 
                            }} value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="text-right">
                        <button class="btn btn-primary">Найти</button>
                    </th>
                </tr>
            </form>
        </thead>
        <tbody>
            @if(count($products))
            @foreach($products as $product)
            @include('admin.product.item')
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center py-5">Ничего не найдено</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection