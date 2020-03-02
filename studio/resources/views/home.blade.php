@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Додати новий заклад та страву</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" id="form" class="main__add" enctype= multipart/form-data>
                            @csrf
                            <div class="form-group">
                                <label for="name_restaurant">Назва закладу</label>
                                <input type="text" name="name_restaurant" class="form-control" id="name_restaurant" >
                            </div>
                            <div class=" main__item">
                                <label id="image_label" class="main__clause">Обрати зображення</label>
                                <input id="image" name="image" type="file">
                            </div>
                            <div class="form-group">
                                <label for="category">Категорiя</label>
                                <input type="text" name="category" class="form-control" id="category">
                            </div>
                            <div class="form-group">
                                <label for="name_dish">Назва страви</label>
                                <input type="text" name="name_dish" class="form-control" id="name_dish">
                            </div>
                            <div class="form-group">
                                <label for="description">Опис</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                            <div class="form-group">
                                <label for="description">Цiна</label>
                                <input type="text" name="price" class="form-control" id="price">
                            </div>
                            <div class=" main__item">
                                <label id="image_label" class="main__clause">Обрати зображення</label>
                                <input id="image" name="picture" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
