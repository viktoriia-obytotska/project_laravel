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
                        <th scope="col">#</th>
                        <th scope="col">Клієнт</th>
                        <th scope="col">Номер телефону</th>
                        <th scope="col">Заклад</th>
                        <th scope="col">Сума замовлення</th>
                        <th scope="col">Адреса доставки</th>
                        <th scope="col">Час доставки</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            </div>
        </div>
    </div>
</div>
@endsection
