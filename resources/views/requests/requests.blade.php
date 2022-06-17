@extends('layouts.layout')

@section('head-title')
    Все заявки
@endsection

@section('content')
@section('page.name')
    Все заявки
@endsection
    <div class="action">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="action__buttons">
                        <div class="d-flex" id="actions">
                            <div class="collapse pe-5" id="delete_items">
                                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d"
                                        form="form-checkbox">
                                    Удалить
                                </button>
                            </div>
                            <div class="w-100">
                                <input type="text" class="form-control" id="search" placeholder="Поиск заявок">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content__table py-4 min-vh-100">
        <div class="container">
            <div class="row">
                <div class="requests-table rounded bg-white">
                    <form action="{{ route('requests.delete-few') }}" method="post"
                          id="form-checkbox">
                        @csrf
                        @method('DELETE')
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th scope="col" class="py-3">
                                    <input class="form-check-input " type="checkbox" value="" id="select_all">
                                </th>
                                <th scope="col" class="fw-normal py-3">Номер</th>
                                <th scope="col" class="fw-normal py-3">Название</th>
                                <th scope="col" class="fw-normal py-3">Описание</th>
                                <th scope="col" class="fw-normal py-3">Статус</th>
                                <th scope="col" class="fw-normal py-3">Срочность</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td style="width: 4%" class="py-3" id="request_id">
                                        <div class="form-check">
                                            <input name="{{ $request['id'] }}" value="{{ $request['id'] }}"
                                                   class="form-check-input checkbox" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="py-3">{{ $request['id'] }}</td>
                                    <td class="py-3">
                                        <a class=""
                                           href="{{ route('requests.show', ['request' => $request['id']]) }}">
                                            {{ Str::limit($request['title'], 30, '...') }}
                                        </a>
                                    </td>
                                    <td class="py-3">
                                        @if(empty($request['description']))
                                            Нет данных
                                        @else
                                            {{ Str::limit($request['description'], 40, '...') }}
                                        @endif

                                    </td>
                                    <td class="py-3">{{ $request['status'] }}</td>
                                    <td class="py-3">
                                        @if(empty($request['urgency']))
                                            Нет данных
                                        @else
                                            {{ $request['urgency'] }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Показывать/скрывать панель действий с элементами
        $('.checkbox').click(function (){
            if ($('#delete_items').hasClass('collapse')) {
                $('#delete_items').removeClass('collapse');
                $('#edit_items').removeClass('collapse');
            } else {
                if (!$('.checkbox').is(":checked")) {
                    $('#delete_items').addClass('collapse');
                    $('#edit_items').addClass('collapse');
                }
            }
        });
        $('#select_all').click(function (){
            if ($('#delete_items').hasClass('collapse')) {
                $('#delete_items').removeClass('collapse');
                $('#edit_items').removeClass('collapse');
            } else {
                if (!$('.checkbox').is(":checked")) {
                    $('#delete_items').addClass('collapse');
                    $('#edit_items').addClass('collapse');
                }
            }
        });
    </script>
@endsection
