@extends('layouts.layout')

@section('head-title')
    Клиенты
@endsection


@section('content')

@section('page.name')
    Клиенты
@endsection

    <div class="employees-form pt-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex" id="actions">
                        <a href="{{ route('clients.create') }}">
                            <button type="button"
                                    class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                                Создать
                            </button>
                        </a>
                        <div class="w-100">
                            <input type="text" class="form-control" id="search" placeholder="Поиск клиентов">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clients min-vh-100">
        <div class="container">
            <div class="row py-4">
                <div class="col">
                    <div class="back-white rounded-3">
                        <div class="requests-table rounded bg-white">
                            <table class="table" id="table">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="fw-normal py-3">Название</th>
                                    <th scope="col" class="fw-normal py-3">Адрес</th>
                                    <th scope="col" class="fw-normal py-3">Email</th>
                                    <th scope="col" class="fw-normal py-3">Дата создания</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td class="py-3">
                                            <a class=""
                                               href="{{ route('clients.show', ['client' => $item['id']]) }}">
                                                {{ $item['name'] }}
                                            </a>
                                        </td>
                                        <td class="py-3">{{ $item['address'] }}</td>
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
