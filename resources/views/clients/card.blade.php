@extends('layouts.layout')

@section('head-title')
    Клиент
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Клиент "{{ $data[0]['name'] }}"
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cards back-light min-vh-100">
        <div class="container">
            <div class="row py-4">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Основная информация</div>
                            </div>
                        </div>
                        <div class="font-text">
                            <div class="row  pb-3">
                                <div class="col-4">Название:</div>
                                <div class="col-8">{{ $data[0]['name'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Адрес:</div>
                                <div class="col-8">{{ $data[0]['address'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Email:</div>
                                <div class="col-8">{{ $data[0]['email'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Условия работы с клиентом:</div>
                                <div class="col-8">{{ $data[0]['working_conditions'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Дата создания:</div>
                                <div class="col-8">{{ $data[0]['created_at'] }}</div>
                            </div>
                            <div class="row  pb-3">
                                <div class="col-4">Дата обновления:</div>
                                <div class="col-8">{{ $data[0]['updated_at'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="employees-form pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex" id="actions">
                                <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                                        class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                    Создать
                                </button>
                            </div>
                        </div>
                        <!-- Modal create -->
                        <form action="{{ route('employees.store',
                      ['company_id' => \Illuminate\Support\Facades\Auth::user()->company_id]) }}"
                              method="post">
                            @csrf
                            <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Создать Контактное лицо</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="name my-3">
                                                <label for="name" class="form-label">Имя</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="surname my-3">
                                                <label for="surname" class="form-label">Фамилия</label>
                                                <input type="text" class="form-control" id="surname" name="surname">
                                            </div>
                                            <div class="email my-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-start">
                                            <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                                Создать
                                            </button>
                                            <button type="button" class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                                    data-bs-dismiss="modal">Отмена
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- EndModal -->
                    </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col">
                    <div class="general-info back-white rounded-3 shadow-sm p-4">
                        <div class="row pb-3">
                            <div class="col">
                                <div class="fsize-20 font-500">Контактные лица</div>
                            </div>
                        </div>
                        <div class="requests-table rounded bg-white">

                            <table class="table">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="fw-normal py-3">Имя</th>
                                    <th scope="col" class="fw-normal py-3">Фамилия</th>
                                    <th scope="col" class="fw-normal py-3">Должность</th>
                                    <th scope="col" class="fw-normal py-3">Email</th>
                                    <th scope="col" class="fw-normal py-3">Дата создания</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td class="py-3">
                                            <a class=""
                                               href="{{ route('clients.show', ['client' => $item['id'], 'company_id' => $company_id]) }}">
                                                {{ $item['name'] }}
                                            </a>
                                        </td>
                                        <td class="py-3">{{ $item['surname'] }}</td>
                                        <td class="py-3">{{ $item['position'] }}</td>
                                        <td class="py-3">{{ $item['email'] }}</td>
                                        <td class="py-3">{{ $item['created_at'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
