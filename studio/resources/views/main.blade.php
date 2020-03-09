@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center"></h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="list-group">
                            <a href="{{route('home')}}" class="list-group-item list-group-item-action">Додати новий заклад</a>
                            <a href="{{route('add_dish')}}" class="list-group-item list-group-item-action">Додати нову страву</a>
                            <a href="{{route('show_restaurants')}}" class="list-group-item list-group-item-action">Список закладiв</a>
                            <a href="{{route('orders')}}" class="list-group-item list-group-item-action">Список замовлень</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
