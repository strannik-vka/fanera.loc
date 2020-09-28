<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" value="{{ isset($category->name) ? $category->name : old('name') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ isset($category->title) ? $category->title : old('title') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Категория</label>
            @if(count($categories))
            <select name="category_id">
                <option value="">- Выбрать -</option>
                @foreach($categories as $item)
                <option {{ 
                    (isset($category->category_id) && $category->category_id == $item['id']) || 
                    (old('category_id') == $item['id']) ? 'selected' : '' 
                }} value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
            @else
            <div class="alert alert-warning">
                Пока ещё нет категорий
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Статус</label>
            <select name="status">
                @foreach(['Включен' => 0, 'Отключен' => 1] as $name => $value)
                <option {{ 
                    (isset($category->status) && $category->status == $value) || 
                    old('status') == $value ? 'selected' : '' 
                }} value="{{ $value }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Позиция</label>
            <input type="number" class="form-control" name="sort" value="{{ isset($category->sort) ? $category->sort : (old('sort') ? old('sort') : 100) }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label>Описание</label>
    <textarea class="form-control" name="description">{!! isset($category->description) ? $category->description : old('description') !!}</textarea>
</div>

<div class="form-group">
    <label>Картинки</label>
    @if(isset($category->images) && $category->images)
    <br>
    @foreach($category->images as $key => $image)
    <img src="{{ $category->image_url($key, 250) }}" class="mw-100 mb-2 mr-2">
    @endforeach
    @endif
    <div class="custom-file">
        <input type="file" name="image_files[]" class="custom-file-input" id="image_files" multiple>
        <label class="custom-file-label" for="image_files">Выберите картинки</label>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-4">{{ isset($category->id) ? 'Сохранить' : 'Создать' }}</button>