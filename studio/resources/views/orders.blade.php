@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="main">
                @csrf
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Клієнт</th>
                        <th scope="col">Номер телефону</th>
                        <th scope="col">Сума замовлення</th>
                        <th scope="col">Адреса доставки</th>
                        <th scope="col">Час доставки</th>
                        <th scope="col">Деталі замовлення</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->first_name}}{{$order->last_name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->amount}} грн</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->time_delivery}}</td>
                        <td>
                            <a href="{{}}"
                               class="card-link">Відкрити повне замовлення</a>
                        </td>
                    </tr>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
