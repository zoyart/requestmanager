@extends('layouts.layout')

@section('head-title')
    Создание карточки клиента
@endsection

@section('content')

@section('page.name')
    Создание карточки клиента
@endsection

    <div class="request-form py-4">
        <div class="container">
            <form method="post" action="{{ route('clients.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="title mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="@error('name') {{ $message }} @enderror">
                        </div>
                        <div class="address mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                   id="address" name="address" placeholder="@error('address') {{ $message }} @enderror">
                        </div>
                        <div class="phone_number mb-3">
                            <label for="phone_number" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                   id="phone_number" name="phone_number" placeholder="@error('phone_number') {{ $message }} @enderror">
                        </div>
                        <div class="email mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" placeholder="@error('email') {{ $message }} @enderror">
                        </div>
                        <div class="working_conditions mb-3">
                            <label for="working_conditions" class="form-label">Условия работы с заказчиком</label>
                            <textarea class="form-control" id="description" rows="10" name="working_conditions"></textarea>
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
