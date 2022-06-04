@extends('layouts.layout')

@section('head-title')
    Все заявки
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Всё заявки
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="action">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="action__buttons">
                        <div class="d-flex" id="actions">
                            <div class="collapse" id="delete_items">
                                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d"
                                        form="form-checkbox">
                                    Удалить
                                </button>
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
                    <form action="{{ route('requests.delete-few', ['company_id' => $company_id]) }}" method="post"
                          id="form-checkbox">
                        @csrf
                        @method('DELETE')
                        <table class="table">
                            <thead class="">
                            <tr>
                                <th scope="col" class="py-3">
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" value="" id="select_all">
                                    </div>
                                </th>
                                <th scope="col" class="fw-normal py-3">Номер</th>
                                <th scope="col" class="fw-normal py-3">Название</th>
                                <th scope="col" class="fw-normal py-3">Описание</th>
                                <th scope="col" class="fw-normal py-3">Статус</th>
                                <th scope="col" class="fw-normal py-3">Срочность</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td style="width: 4%" class="py-3" id="request_id">
                                        <div class="form-check">
                                            <input name="{{ $item['id'] }}" value="{{ $item['id'] }}"
                                                   class="form-check-input checkbox" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="py-3">{{ $item['id'] }}</td>
                                    <td class="py-3">
                                        <a class=""
                                           href="{{ route('requests.show', ['company_id' => $company_id, 'request' => $item['id']]) }}">
                                            {{ Str::limit($item['title'], 20, '...') }}
                                        </a>
                                    </td>
                                    <td class="py-3">{{ Str::limit($item['description'], 30, '...') }}</td>
                                    <td class="py-3">{{ $item['status'] }}</td>
                                    <td class="py-3">{{ $item['urgency'] }}</td>
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
