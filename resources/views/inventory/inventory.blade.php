@extends('layouts.layout')

@section('head-title')
    Склад
@endsection

@section('content')
@section('page.name')
    Склад
@endsection
<div class="inventory-form pb-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex" id="actions">
                    <button type="button" data-bs-target="#create" data-bs-toggle="modal"
                            class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                        Добавить
                    </button>
                    <div class="collapse" id="delete_items">
                        <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d"
                                form="form-checkbox">
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal create -->
            <form action="{{ route('inventory.store') }}"
                  method="post">
                @csrf
                <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Добавить предмет на склад</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="name my-3">
                                    <label for="name" class="form-label">Название</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" placeholder="@error('name') {{ $message }} @enderror">
                                </div>
                                <div class="count my-3">
                                    <label for="count" class="form-label">Количество</label>
                                    <input type="text" class="form-control @error('count') is-invalid @enderror"
                                           id="count" name="count" placeholder="@error('count') {{ $message }} @enderror">
                                </div>
                                <div class="price my-3">
                                    <label for="price" class="form-label">Цена</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                           id="price" name="price" value="0" placeholder="@error('price') {{ $message }} @enderror">
                                </div>
                                <div class="cost_price my-3">
                                    <label for="cost_price" class="form-label">Себестоимость</label>
                                    <input type="text" class="form-control @error('cost_price') is-invalid @enderror"
                                           id="cost_price" name="cost_price" value="0" placeholder="@error('cost_price') {{ $message }} @enderror">
                                </div>
                                <div class="article_number my-3">
                                    <label for="article_number" class="form-label">Артикул</label>
                                    <input type="text" class="form-control @error('article_number') is-invalid @enderror"
                                           id="article_number" name="article_number" placeholder="@error('article_number') {{ $message }} @enderror">
                                </div>
                                <div class="comment my-3">
                                    <label for="comment" class="form-label">Комментарий</label>
                                    <textarea type="text" class="form-control @error('comment') is-invalid @enderror"
                                              id="comment" name="comment" rows="5" placeholder="@error('comment') {{ $message }} @enderror">
                                    </textarea>
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
            </form>
            <!-- EndModal -->
        </div>
    </div>
</div>
<div class="content__table py-4 min-vh-100">
    <div class="container">
        <div class="row">
            <div class="requests-table rounded bg-white">
                <form action="{{ route('inventory.delete-few') }}" method="post"
                      id="form-checkbox">
                    @csrf
                    @method('DELETE')
                    <table class="table">
                        <thead class="">
                        <tr>
                            <th scope="col" class="py-3">
                                <input class="form-check-input " type="checkbox" value="" id="select_all">
                            </th>
                            <th scope="col" class="fw-normal py-3">Номер</th>
                            <th scope="col" class="fw-normal py-3">Название</th>
                            <th scope="col" class="fw-normal py-3">Количество</th>
                            <th scope="col" class="fw-normal py-3">Цена</th>
                            <th scope="col" class="fw-normal py-3">Артикул</th>
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
                                       href="{{ route('inventory.show', ['inventory' => $item['id']]) }}">
                                        {{ Str::limit($item['name'], 20, '...') }}
                                    </a>
                                </td>
                                <td class="py-3">{{ $item['count'] }}</td>
                                <td class="py-3">
                                    @if(empty($item['price']))
                                        Нет данных
                                    @else
                                        {{ $item['price'] }}
                                    @endif
                                </td>
                                <td class="py-3">
                                    @if(empty($item['article_number']))
                                        Нет данных
                                    @else
                                        {{ $item['article_number'] }}
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
