@extends('layouts.layout')

@section('head-title')
    Редактирование
@endsection

@section('content')

@section('page.name')
    Изменение данных "{{ $data[0]['name'] }}"
@endsection

<div class="request-form py-4">
    <div class="container">
        <form method="post" action="{{ route('inventory.update', ['inventory' => $data[0]['id']]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-8">
                    <div class="name mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ $data[0]['name'] }}"
                               placeholder="@error('name') {{ $message }} @enderror" required>
                    </div>
                    <div class="count mb-3">
                        <label for="count" class="form-label">Количество</label>
                        <input type="text" class="form-control @error('count') is-invalid @enderror"
                               id="count" name="count" value="{{ $data[0]['count'] }}"
                               placeholder="@error('count') {{ $message }} @enderror" >
                    </div>
                    <div class="price mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                               id="price" name="price" value="{{ $data[0]['price'] }}"
                               placeholder="@error('price') {{ $message }} @enderror" >
                    </div>
                    <div class="cost_price mb-3">
                        <label for="cost_price" class="form-label">Себестоимость</label>
                        <input type="text" class="form-control @error('cost_price') is-invalid @enderror"
                               id="cost_price" name="cost_price" value="{{ $data[0]['cost_price'] }}"
                               placeholder="@error('cost_price') {{ $message }} @enderror" required>
                    </div>
                    <div class="article_number mb-3">
                        <label for="article_number" class="form-label">Артикул</label>
                        <input type="text" class="form-control @error('article_number') is-invalid @enderror"
                               id="article_number" name="article_number" value="{{ $data[0]['article_number'] }}"
                               placeholder="@error('article_number') {{ $message }} @enderror">
                    </div>
                    <div class="comment mb-3">
                        <label for="comment" class="form-label">Комментарий</label>
                        <textarea class="form-control" id="comment" rows="10" name="comment" value="">{{ $data[0]['comment'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg">
                    <button type="submit" class="d-inline-block button-sm border-0 rounded-pill y-to-d">Обновить</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
