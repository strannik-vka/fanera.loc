<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" value="{{ isset($product->name) ? $product->name : old('name') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Категория</label>
            @if(count($categories))
            <select name="category_id">
                <option value="">- Выбрать -</option>
                @foreach($categories as $category)
                <option {{ 
                    (isset($product->category_id) && $product->category_id == $category['id']) || 
                    (old('category_id') == $category['id']) ? 'selected' : '' 
                }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            @else
            <div class="alert alert-warning">
                В системе нет категорий <a href="{{ Route('admin.category.create') }}">Добавить</a>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="amount" value="{{ isset($product->amount) ? $product->amount : old('amount') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Старая цена</label>
            <input type="text" class="form-control" name="amount_old" value="{{ isset($product->amount_old) ? $product->amount_old : old('amount_old') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Статус</label>
            <select name="status">
                @foreach(['Включен' => 0, 'Отключен' => 1] as $name => $value)
                <option {{ 
                    (isset($product->status) && $product->status == $value) || 
                    old('status') == $value ? 'selected' : '' 
                }} value="{{ $value }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Позиция</label>
            <input type="number" class="form-control" name="sort" value="{{ isset($product->sort) ? $product->sort : (old('sort') ? old('sort') : 100) }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Описание</label>
    <textarea class="form-control" name="description">{{ isset($product->description) ? $product->description : old('description') }}</textarea>
</div>

<div class="form-group">
    <label>Характеристики</label>
    <div class="row">
        @for($i = 0; $i < 5; $i++)
        <div class="col-md-6">
            <input type="text" class="form-control mt-1" name="props[name][]" value="{{ isset($product->props['name'][$i]) ? $product->props['name'][$i] : '' }}" placeholder="Название">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control mt-1" name="props[value][]" value="{{ isset($product->props['value'][$i]) ? $product->props['value'][$i] : '' }}" placeholder="Значение">
        </div>
        @endfor
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Картинки</label>
            @if(isset($product->images) && $product->images)
            <br>
            @foreach($product->images as $key => $image)
            <img src="{{ $product->image_url($key, 250) }}" class="mw-100 mb-2 mr-2">
            @endforeach
            @endif
            <div class="custom-file">
                <input type="file" name="image_files[]" class="custom-file-input" id="image_files" multiple>
                <label class="custom-file-label" for="image_files">Выберите картинки</label>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-4">{{ isset($product->id) ? 'Сохранить' : 'Создать' }}</button>