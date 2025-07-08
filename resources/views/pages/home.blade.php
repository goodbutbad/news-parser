@extends('app')
@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Новости с Kaktus.media</h1>

    <form method="GET" action="{{ route('home') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" name="date" id="date" value="{{ $date }}" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="query" class="form-label">Поиск по заголовку</label>
            <input type="text" name="query" id="query" value="{{ $query }}" class="form-control" placeholder="Например: выборы">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Найти</button>
        </div>
    </form>

    @if(empty($news))
        <div class="alert alert-warning">Новости не найдены за выбранную дату.</div>
    @else
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->image)
                            <img src="{{ $item->image }}" class="card-img-top" alt="Изображение новости">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <a href="{{ $item->url }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
                                Читать на сайте
                            </a>
                        </div>
                        <div class="card-footer text-muted small">
                            {{ $item->date }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection