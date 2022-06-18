@extends('layouts.layout')

@section('head-title')
    Согласование
@endsection

@section('content')

@section('page.name')
    Согласование
@endsection

<div class="card__buttons">
    <div class="container">
        <div class="d-flex">
            <button type="button" class="button-sm border-0 rounded-pill y-to-d" data-bs-target="#change-status"
                    data-bs-toggle="modal">
                Добавить сообщение
            </button>
            <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal create -->
                <div class="modal fade" id="change-status" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Изменить статус заявки</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="message mb-3">
                                    <label for="message" class="form-label">Комментарий:</label>
                                    <textarea class="form-control" id="message" rows="10" name="message"></textarea>
                                </div>
                                <div class="file my-3">
                                    <label for="file" class="form-label">Загрузите файл:</label>
                                    <input type="file" class="form-control-file" id="file" name="file">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-start">
                                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                    Добавить
                                </button>
                                <button type="button" class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                        data-bs-dismiss="modal">Отмена
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EndModal -->
            </form>
        </div>
    </div>
</div>
<div class="card__menu pt-4">
    <div class="container">
        <div class="col">
            <div class="d-flex">
                <a class="tab rounded-top font-dark text-center font-500" href="">Карточка заявки</a>
                <a class="tab rounded-top back-light font-dark text-center font-500" href="">Согласования</a>
            </div>
        </div>
    </div>
</div>
<div class="cards back-light min-vh-100">
    <div class="container">
        <div class="row py-4">
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>
@endsection
