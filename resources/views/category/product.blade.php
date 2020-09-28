<div class="catalog__item card col-12 col-sm-6 col-lg-3">
    <div class="card__inner">
        <div class="card__image">
            <img src="{{ $product->image_url(0, 250) }}" alt="{{ $product->name }}">
        </div>
        <div class="card__body">
            <p class="card__title">{{ $product->name }}</p>
            @if($product->props)
            <div class="card__props">
                @php
                    $count = count($product->props);
                @endphp
                @for($i = 0; $i < $count; $i++)
                    <p>{{ $product->props['name'][$i] }}: {{ $product->props['value'][$i] }}</p>
                @endfor
                <p class="p--accent">Образец БЕСПЛАТНО!</p>
            </div>
            @endif
            <p class="card__price">от {{ $product->amount }} ₽</p>
            <a href="#ex1" rel="modal:open" class="btn btn--light" onclick="return changeMessage('{{ $product->name }}');">Заказать расчет</a>
        </div>
    </div>
</div>