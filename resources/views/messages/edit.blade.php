@extends('layouts.layout')

@section('head-title')
    Редактирование согласования
@endsection

@section('content')

@section('page.name')
    Редактирование согласования
@endsection

<div class="cards back-light min-vh-100">
    <div class="container">
        <form action="{{ route('messages.update', ['id' => $id, 'message' => $data->id]) }}"
              method="post">
            @csrf
            @method('PUT')
            <div class="row py-4">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Основная информация</div>
                            </div>
                        </div>
                        <div class="font-text">
                            <div class="row  pb-3 align-items-center">
                                <div class="">Статус:</div>
                                <div class="">
                                    <select name="status" class="form-select">
                                        <option value="{{ $data['status'] }}" selected>{{ $data['status'] }}</option>
                                        <option value="Новая">Новая</option>
                                        <option value="Не согласовано">Не согласовано</option>
                                        <option value="Согласовано">Согласовано</option>
                                    </select>
                                </div>
                            </div>
                            <div class="description mb-3">
                                <label for="message" class="form-label">Сообщение:</label>
                                <textarea class="form-control" id="message" rows="16"
                                          name="message" value="">{{ $data['message'] }}
                                    </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row pb-3">--}}
{{--                <div class="file my-3">--}}
{{--                    <label for="file" class="form-label">Чтобы обновить </label>--}}
{{--                    <input type="file" class="form-control-file" id="file" name="file">--}}
{{--                </div>--}}
{{--                @if($data->file)--}}
{{--                    <div class="accordion" id="accordionExample">--}}
{{--                        <div class="accordion-item">--}}
{{--                            <h2 class="accordion-header" id="headingTwo">--}}
{{--                                <button class="accordion-button collapsed" type="button"--}}
{{--                                        data-bs-toggle="collapse"--}}
{{--                                        data-bs-target="#collapse{{ $data->id }}" aria-expanded="false"--}}
{{--                                        aria-controls="collapseTwo">--}}
{{--                                    Показать файл--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="collapse{{ $data->id }}" class="accordion-collapse collapse"--}}
{{--                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    <a data-fancybox href="{{ asset('public/storage/' . $data->file) }}">--}}
{{--                                        <img src="{{ asset('public/storage/' . $data->file) }}" alt=""--}}
{{--                                             class="img-fluid">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
            <div class="row my-3">
                <div class="col-lg">
                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Обновить
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
