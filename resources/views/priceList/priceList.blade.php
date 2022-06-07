@extends('layouts.layout')

@section('head-title')
    Все прайс листы
@endsection

@section('content')
    <div class="page__name py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title font-500 fsize-20">
                        Прайс листы
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="price-list-form pb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex" id="actions">
                        <button type="button" data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                                class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3">
                            Создать
                        </button>
                        <div class="collapse" id="delete_items">
                            <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3"
                                    form="form-checkbox">
                                Удалить
                            </button>
                        </div>
                        <div class="collapse" id="edit_items">
                            <button type="button"
                                    class="d-inline-block button-sm border-0 rounded-pill y-to-d me-3 edit"
                                    data-bs-target="#editModal" data-bs-toggle="modal">
                                Редактировать
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal create -->
                <form action=" {{ route('price-list.store') }} "
                      method="post">
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Создайте новый прайс лист</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="name my-3">
                                        <label for="name" class="form-label">Название</label>
                                        <input type="text" class="form-control" id="name" name="name">
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

                <!-- Modal edit -->
                <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Редактировать элементы</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal-body-edit">

                            </div>
                            <div class="modal-footer d-flex justify-content-start">
                                <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">
                                    Обновить
                                </button>
                                <button type="button" class="d-inline-block button-sm border-0 rounded-pill l-to-d"
                                        data-bs-dismiss="modal">Отмена
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EndModal -->
            </div>
        </div>
    </div>
    <div class="content__table py-4 back-light min-vh-100">
        <div class="container">
            <div class="row">
                <div class="requests-table rounded bg-white">
                    <form action="{{ route('price-list.delete-few') }}" method="post"
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
                                <th scope="col" class="font-500 py-3">Дата создания</th>
                                <th scope="col" class="font-500 py-3">Автор</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr class="table_items">
                                    <td style="width: 2%" class="py-3" id="request_id">
                                        <div class="form-check">
                                            <input name="{{ $item['id'] }}" value="{{ $item['id'] }}"
                                                   class="form-check-input checkbox" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <a class="price-list_name"
                                           href=" {{ route('work.show', ['id' => $item['id']]) }} ">{{ $item['name'] }}
                                        </a>
                                    </td>
                                    <td class="py-3">{{ $item['created_at'] }}</td>
                                    <td class="py-3">{{ $item['author'] }}</td>
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
        var elements = new Map();
        $('.checkbox').click(function (){
            if ($('#delete_items').hasClass('collapse') && $('#edit_items').hasClass('collapse')) {
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
            if ($('#delete_items').hasClass('collapse') && $('#edit_items').hasClass('collapse')) {
                $('#delete_items').removeClass('collapse');
                $('#edit_items').removeClass('collapse');
            } else {
                if (!$('.checkbox').is(":checked")) {
                    $('#delete_items').addClass('collapse');
                    $('#edit_items').addClass('collapse');
                }
            }
        });

        // $('.table').find('.checkbox').click(function () {
        //     if ($(this).is(":checked") && !$(this).hasClass('enable')) {
        //         let id = $(this).val();
        //         $(this).addClass('enable');
        //
        //         $('#editModal').find('.modal-body').append("<div class=\"name my-3\" value=\"" + id + "\"> " +
        //             "<label for=\"name\" class=\"form-label\">Редактировать название прайс листа" +
        //             "</label> <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" " +
        //             "value=\"" + $(this).parent().parent().parent().find(".price-list_name").text() + "\"></div>");
        //     } else {
        //         // $(this).removeClass('enable');
        //
        //     }
        // });

        {{--$.ajax({--}}
        {{--    url: "{{ route('price-list.edit', ['company_id' => 1, 'price_list' => 3]) }}",--}}
        {{--    type: "GET",--}}
        {{--    data: {--}}
        {{--        "_token": "{{ csrf_token() }}",--}}
        {{--        company_id: 1,--}}
        {{--        elements: elements,--}}
        {{--        id: 3,--}}
        {{--    },--}}
        {{--    success: function (response) {--}}
        {{--        // location.reload();--}}
        {{--    }--}}
        {{--});--}}
    </script>
@endsection
