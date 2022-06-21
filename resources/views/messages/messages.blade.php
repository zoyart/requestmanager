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
            <button type="button" class="button-sm border-0 rounded-pill y-to-d" data-bs-target="#create-message"
                    data-bs-toggle="modal">
                Добавить сообщение
            </button>
            <form action="{{ route('messages.store', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal create -->
                <div class="modal fade" id="create-message" data-bs-backdrop="static" data-bs-keyboard="false"
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
                <a class="tab rounded-top font-dark text-center font-500"
                   href="{{ route('requests.show', ['request' => $id]) }}">Карточка заявки</a>
                <a class="tab rounded-top back-light font-dark text-center font-500" href="">Согласования</a>
            </div>
        </div>
    </div>
</div>
<div class="cards back-light min-vh-100">
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach($data as $item)
                    <div class="back-white rounded-3 shadow-sm p-4 my-5">
                        <div class="row pb-3">
                            <div class="col">
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="fw-normal py-3">Сообщение</th>
                                        <th scope="col" class="fw-normal py-3">Статус</th>
                                        <th scope="col" class="fw-normal py-3">Автор</th>
                                        <th scope="col" class="fw-normal py-3">Создано</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="py-3">{{ $item->message }}</td>
                                        <td class="py-3">{{ $item->status }}</td>
                                        <td class="py-3">{{ $item->author }}</td>
                                        <td class="py-3">{{ $item->created_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="d-flex">
                                <button type="button" class="button-sm border-0 rounded-pill y-to-d my-2 mx-2"
                                        data-bs-target="#change-status"
                                        data-bs-toggle="modal">
                                    Изменить статус
                                </button>
                                <form action="">
                                    @csrf
                                    <button type="submit" class="button-sm border-0 rounded-pill y-to-d my-2 mx-2">
                                        Редактировать
                                    </button>
                                </form>
                                <form action="{{ route('messages.destroy', ['id' => $id, 'message' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="button-sm border-0 rounded-pill y-to-d my-2 mx-2">
                                        Удалить
                                    </button>
                                </form>

                            </div>
                        </div>
                        <form action="{{ route('messages.change-status', ['id' => $item->id]) }}"
                              method="post">
                        @csrf
                        @method('PUT')
                        <!-- Modal create -->
                            <div class="modal fade" id="change-status" data-bs-backdrop="static"
                                 data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Изменить статус
                                                заявки</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name my-3">
                                                <label for="name" class="form-label">Текущий
                                                    статус: "{{ $item->status }}"</label>
                                            </div>
                                            <div class="status mb-3">
                                                <label class="form-label">Укажите новый статус: </label>
                                                <select name="status" class="form-select">
                                                    <option value="Новая">Новая</option>
                                                    <option value="Не согласовано">Не согласовано</option>
                                                    <option value="Согласовано">Согласовано</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-start">
                                            <button type="submit"
                                                    class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                                Изменить
                                            </button>
                                            <button type="button"
                                                    class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                                    data-bs-dismiss="modal">Отмена
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- EndModal -->
                        </form>
                        <div class="row">
                            @if($item->file)
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $item->id }}" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                Показать файл
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                                             aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <a data-fancybox href="{{ asset('public/storage/' . $item->file) }}">
                                                    <img src="{{ asset('public/storage/' . $item->file) }}" alt=""
                                                         class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
