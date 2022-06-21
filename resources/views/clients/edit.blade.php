@extends('layouts.layout')

@section('head-title')
    Редактирование клиента
@endsection

@section('content')

@section('page.name')
    Изменение данных пользователя "{{ $data[0]['name'] }}"
@endsection

    <div class="request-form py-4">
        <div class="container">
            <form method="post" action="{{ route('clients.update', ['client' => $data[0]['id']]) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="title mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ $data[0]['name'] }}"
                                   placeholder="@error('name') {{ $message }} @enderror" required>
                        </div>
                        <div class="address mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                   id="address" name="address" value="{{ $data[0]['address'] }}"
                                   placeholder="@error('address') {{ $message }} @enderror" >
                        </div>
                        <div class="phone_number mb-3">
                            <label for="phone_number" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                   id="phone_number" name="phone_number" value="{{ $data[0]['phone_number'] }}"
                                   placeholder="@error('phone_number') {{ $message }} @enderror" >
                        </div>
                        <div class="email mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ $data[0]['email'] }}"
                                   placeholder="@error('email') {{ $message }} @enderror" required>
                        </div>
                        <div class="working_conditions mb-3">
                            <label for="working_conditions" class="form-label">Условия работы с заказчиком</label>
                            <textarea class="form-control" id="description" rows="10" name="working_conditions" value="">
{{ $data[0]['working_conditions'] }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg">
                        <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Обновить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
