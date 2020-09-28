<tr data-id="{{ $category->id }}">
    <td><img src="{{ $category->image_url(0, 250) }}" width="80"></td>
    <td width="500">
        <input name="name" type="text" class="form-control form-control-sm" placeholder="Название" value="{{ $category->name }}">
        <input name="title" type="text" class="form-control form-control-sm mt-1" placeholder="Заголовок" value="{{ $category->title }}">
        <textarea class="form-control form-control-sm" name="description">{!! $category->description !!}</textarea>
    </td>
    <td>
        @if(count($categories_select))
        <select name="category_id">
            <option value="">—</option>
            @foreach($categories_select as $item)
            <option {{ 
                (isset($category->category->id) && $category->category->id == $item['id']) 
                ? 'selected' : '' 
            }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        @else
        '—'
        @endif
    </td>
    <td>
        <input name="sort" type="text" class="form-control form-control-sm w-25 text-center" placeholder="Позиция" value="{{ $category->sort }}">
    </td>
    <td>
        <select name="status">
            @foreach(['Включен' => 0, 'Отключен' => 1] as $name => $value)
            <option {{ 
                    (isset($category->status) && $category->status == $value) ? 'selected' : '' 
                }} value="{{ $value }}">{{ $name }}</option>
            @endforeach
        </select>
    </td>
    <td class="text-right">
        <a href="javascript://" onclick="core.remove_item({{ $category->id }})"><i class="far fa-trash-alt text-primary ml-3" data-toggle="tooltip" data-placement="top" title="Удалить"></i></a>
        <a href="{{ Route('admin.category.edit', $category->id) }}" class="ml-2"><i class="far fa-edit text-primary" data-toggle="tooltip" data-placement="top" title="Редактировать"></i></a>
    </td>
</tr>