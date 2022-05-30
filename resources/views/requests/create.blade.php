@extends('layouts.layout')

@section('head-title')
Создание заявки
@endsection

@section('content')
<div class="page__name py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title font-500 fsize-20">
                    Создание заявки
                </div>
            </div>
        </div>
    </div>
</div>
<div class="request-form py-4">
    <div class="container">
        <form method="post" action="{{ route('requests.store', \Illuminate\Support\Facades\Auth::user()->company_id) }}">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="title mb-3">
                        <label for="title" class="form-label">Тема</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="description mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" id="description" rows="10" name="description"></textarea>
                    </div>
                    <div class="urgency mb-3">
                        <label class="form-label">Срочность</label>
                        <select name="urgency" class="form-select">
                            <option value="Низкая" selected>Низкая</option>
                            <option value="Средняя">Средняя</option>
                            <option value="Высокая">Высокая</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="address-object mb-3">
                        <label for="address-object" class="form-label">Адрес объекта</label>
                        <input type="text" class="form-control" id="address-object" name="address_object">
                    </div>
                    <div class="client mb-3">
                        <label class="form-label">Клиент</label>
                        <select class="form-select">
                            <option selected>---</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg">
                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Создать</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
