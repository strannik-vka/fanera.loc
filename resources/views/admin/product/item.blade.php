<tr data-id="{{ $product->id }}">
    <td><img src="{{ $product->image_url(0, 250) }}" width="80"></td>
    <td width="400">
        <input name="name" type="text" class="form-control form-control-sm" placeholder="Название" value="{{ $product->name }}">
        <textarea class="form-control form-control-sm mt-1" placeholder="Описание товара" name="description">{!! $product->description !!}</textarea>
    </td>
    <td width="150">
        <input name="amount" type="text" class="form-control form-control-sm text-center" placeholder="Цена" value="{{ $product->amount }}">
        <input name="amount_old" type="text" class="mt-1 through form-control form-control-sm text-center" placeholder="Старая цена" value="{{ $product->amount_old }}">
    </td>
    <td width="150">
        @if(count($categories_select))
        <select name="category_id">
            <option value="">—</option>
            @foreach($categories_select as $item)
            <option {{ 
                (isset($product->category->id) && $product->category->id == $item['id']) 
                ? 'selected' : '' 
            }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        @else
        '—'
        @endif
    </td>
    <td width="80">
        <input name="sort" type="text" class="form-control form-control-sm text-center" placeholder="Позиция" value="{{ $product->sort }}">
    </td>
    <td width="100">
        <select name="status">
            @foreach(['Включен' => 0, 'Отключен' => 1] as $name => $value)
            <option {{ 
                    (isset($product->status) && $product->status == $value) ? 'selected' : '' 
                }} value="{{ $value }}">{{ $name }}</option>
            @endforeach
        </select>
    </td>
    <td class="text-right">
        <a href="javascript://" onclick="core.remove_item({{ $product->id }})"><i class="far fa-trash-alt text-primary ml-3" data-toggle="tooltip" data-placement="top" title="Удалить"></i></a>
        <a href="{{ Route('admin.product.edit', $product->id) }}" class="ml-2"><i class="far fa-edit text-primary" data-toggle="tooltip" data-placement="top" title="Редактировать"></i></a>
    </td>
</tr>