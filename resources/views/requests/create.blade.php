@extends('layouts.layout')

@section('head-title')
Создание заявки
@endsection

@section('content')

@section('page.name')
    Создание заявки
@endsection

<div class="request-form py-4">
    <div class="container">
        <form method="post" action="{{ route('requests.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="title mb-3">
                        <label for="title" class="form-label">Тема</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                               name="title" placeholder=" @error('title') {{ $message }} @enderror">
                    </div>
                    <div class="description mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="10"
                                  name="description" placeholder="@error('description') {{ $message }} @enderror"></textarea>
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
                    <div class="user_id mb-3">
                        <label for="user_id" class="form-label">Исполнитель</label>
                        <select name="user_id"  class="form-select">
                            <option value="{{auth()->user()->id}}" selected>Я</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee['id'] }}">{{ $employee['name'] }}
                                    {{ $employee['surname'] }} ({{ $employee['position'] }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="client mb-3">
                        <label class="form-label">Клиент</label>
                        <select class="form-select">
                            <option selected>Частное лицо</option>
                            @foreach($clients as $client)
                                <option>{{ $client['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="contact_person mb-3">
                        <label for="contact_person" class="form-label">Контактное лицо</label>
                        <select name="contact_person" class="form-select">
                            <option value="0" selected>Нет</option>
                            @foreach($contactPersons as $contactPerson)
                                <option value="{{ $contactPerson['id'] }}">{{ $contactPerson['name'] }} {{ $contactPerson['surname'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="address-object mb-3">
                        <label for="address-object" class="form-label">Адрес объекта</label>
                        <input type="text" class="form-control" id="address-object" name="address_object">
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
