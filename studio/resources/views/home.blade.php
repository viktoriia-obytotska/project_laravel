@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление новых заведений и блюд</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form>
                            <div class="form-group">
                                <label for="name_restaurant">Название заведения</label>
                                <input type="text" name="name_restaurant" class="form-control" id="name_restaurant" >
                            </div>
                            <div class=" main__item">
                                <label id="image_label" class="main__clause">Выберите изображение</label>
                                <input id="image" name="image" type="file">
                            </div>
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <input type="text" name="category" class="form-control" id="category">
                            </div>
                            <div class="form-group">
                                <label for="name_dish">Название блюда</label>
                                <input type="text" name="name_dish" class="form-control" id="name_dish">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                            <div class="form-group">
                                <label for="description">Цена</label>
                                <input type="text" name="price" class="form-control" id="price">
                            </div>
                            <div class=" main__item">
                                <label id="image_label" class="main__clause">Выберите изображение</label>
                                <input id="image" name="image" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
