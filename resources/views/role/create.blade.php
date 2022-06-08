@extends('layouts.layout')

@section('head-title')
    Создание роли
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Создание роли
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="request-form py-4">
        <div class="container">
            <form method="post" action="{{ route('role.store') }}">
                @csrf
                <div class="row pb-4">
                    <div class="col-lg-8">
                        <div class="title mb-3">
                            <label for="name" class="form-label">Название роли</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder=" @error('name') {{ $message }} @enderror">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg">
                        <div class="requests">
                            <div class="font-500 fsize-20 pb-2">Заявки</div>
                            @foreach($request as $item)
                                <div class="font-text pb-1">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $item['id'] }}">
                                    <label class="form-check-label" for="exampleCheck{{ $item['id'] }}">{{ $item['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="requests">
                            <div class="font-500 fsize-20 pb-2">Прайс листы</div>
                            @foreach($request as $item)
                                <div class="font-text  pb-1">
                                    <input type="checkbox" class="form-check-input ">
                                    <label for="name">{{ $item['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="requests">
                            <div class="font-500 fsize-20 pb-2">Сотрудники</div>
                            @foreach($request as $item)
                                <div class="font-text  pb-1">
                                    <input type="checkbox" class="form-check-input ">
                                    <label for="name">{{ $item['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="requests">
                            <div class="font-500 fsize-20 pb-2">Клиенты</div>
                            @foreach($request as $item)
                                <div class="font-text  pb-1">
                                    <input type="checkbox" class="form-check-input ">
                                    <label for="name">{{ $item['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-lg">
                        <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Создать роль</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
