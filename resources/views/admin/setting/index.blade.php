@extends('admin.global.app')

@section('title', 'Настройки')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Настройки</li>
        </ol>
    </nav>

    <div data-id="1">
        <h5>Контакты</h5>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="contact[phone]" value="{{ $setting->contact['phone'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="contact[email]" value="{{ $setting->contact['email'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Адрес</label>
                    <textarea class="form-control" name="contact[address]">{{ $setting->contact['address'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="contact[instagram]" value="{{ $setting->contact['instagram'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>ВКонтакте</label>
                    <input type="text" class="form-control" name="contact[vk]" value="{{ $setting->contact['vk'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Whatsapp</label>
                    <input type="text" class="form-control" name="contact[whatsapp]" value="{{ $setting->contact['whatsapp'] ?? '' }}">
                </div>
            </div>
        </div>

        <h5>Информация</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>ИНН</label>
                    <input type="text" class="form-control" name="information[inn]" value="{{ $setting->information['inn'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>КПП</label>
                    <input type="text" class="form-control" name="information[kpp]" value="{{ $setting->information['kpp'] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>ОГРН</label>
                    <input type="text" class="form-control" name="information[ogrn]" value="{{ $setting->information['ogrn'] ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection