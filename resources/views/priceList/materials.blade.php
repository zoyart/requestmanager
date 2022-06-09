@extends('layouts.layout')

@section('head-title')
    @if(!isset($data))
        Прайс лист "{{ $data[0]['id'] }}"
    @endif
@endsection

@section('content')

@section('page.name')
    Прайс лист по "{{ $priceListData[0]['name'] }}"
@endsection

    <div class="price-list-form pb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <button type="button" data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                                class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">Создать
                        </button>
                        <div class="collapse" id="delete_items">
                            <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3"
                                    form="form-checkbox">
                                Удалить
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <form action=" {{ route('material.store', ['id' => $id]) }} "
                      method="post">
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Создайте объект</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="name my-3">
                                        <label for="name" class="form-label">Название</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="category mb-3">
                                        <label class="form-label">Категория</label>
                                        <select name="category" class="form-select">
                                            <option value="Категория 1" selected>Категория 1</option>
                                            <option value="Категория 2">Категория 2</option>
                                            <option value="Категория 3">Категория 3</option>
                                        </select>
                                    </div>
                                    <div class="price my-3">
                                        <label for="price" class="form-label">Цена</label>
                                        <input type="text" class="form-control" id="price" name="price">
                                    </div>
                                    <div class="vat mb-3">
                                        <label class="form-label">С учетом НДС?</label>
                                        <select name="vat" class="form-select">
                                            <option value="Да" selected>Да</option>
                                            <option value="Нет">Нет</option>
                                        </select>
                                    </div>
                                    <input type="hidden" value="material" name="type">
                                    <input type="hidden" value="{{ $priceListData[0]['id'] }}" name="priceListId">
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
    <div class="card__menu pt-4">
        <div class="container">
            <div class="col">
                <div class="d-flex">
                    <a class="tab rounded-top font-dark text-center font-500"
                       href="{{ route('work.show', ['id' => $id]) }}">Прайс лист работы</a>
                    <a class="tab rounded-top font-dark back-light text-center font-500" href="">
                        Прайс лист материалы</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content__table py-4 back-light min-vh-100">
        <div class="container">
            <div class="row">
                <div class="requests-table rounded bg-white">
                    <form action="{{ route('material.delete-few', ['id' => $id]) }}" method="post"
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
                                <th scope="col" class="font-500 py-3">Название</th>
                                <th scope="col" class="font-500 py-3">Цена</th>
                                <th scope="col" class="font-500 py-3">Категория</th>
                                <th scope="col" class="font-500 py-3">НДС</th>
                                <th scope="col" class="font-500 py-3">Дата создания</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td style="width: 2%" class="py-3">
                                        <div class="form-check">
                                            <input name="{{ $item['id'] }}" class="form-check-input checkbox" type="checkbox"
                                                   value="{{ $item['id'] }}">
                                        </div>
                                    </td>
                                    <td class="py-3">{{ $item['name'] }}</td>
                                    <td class="py-3">{{ $item['price'] }}</td>
                                    <td class="py-3">{{ $item['category'] }}</td>
                                    <td class="py-3">{{ $item['vat'] }}
                                    </td>
                                    <td class="py-3">{{ $item['created_at'] }}</td>

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
