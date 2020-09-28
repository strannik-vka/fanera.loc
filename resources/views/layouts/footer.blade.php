<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer__col col-12 col-sm-6 col-lg-3">
                @if(isset($setting->contact['phone']))
                <a href="tel:{{ $setting->contact['phone'] }}" class="footer__phone">{{ $setting->contact['phone'] }}</a><br>
                @endif
                <a href="#ex1" rel="modal:open" class="btn btn--primary">Заказать звонок</a>
            </div>
            <div class="footer__col col-12 col-sm-6 col-lg-3">
                <h5 class="footer__col-title">О нас</h5>
                <p>
                    ИНН/КПП 
                    {{ $setting->information['inn'] ?? '' }}
                    {{ $setting->information['kpp'] ?? '' }}
                </p>
                <p>ОГРН {{ $setting->information['ogrn'] ?? '' }}</p>
            </div>
            <div class="footer__col col-12 col-sm-6 col-lg-3">
                <h5 class="footer__col-title">Офис продаж:</h5>
                @if(isset($setting->contact['phone']))
                <p>Тел: {{ $setting->contact['phone'] }}</p>
                @endif
                @if(isset($setting->contact['email']))
                <p>E-mail: {{ $setting->contact['email'] }}</p>
                @endif
            </div>
            @if(isset($setting->contact['address']))
            <div class="footer__col col-12 col-sm-6 col-lg-3">
                <h5 class="footer__col-title">Адрес:</h5>
                <p>{{ $setting->contact['address'] }}</p>
            </div>
            @endif
        </div>
    </div>
</footer>