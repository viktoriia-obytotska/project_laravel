@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Додати нову страву</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('add_dish')}}" method="post" id="form"
                              class="main__add" enctype= multipart/form-data>
                            @csrf
                            <div class="form-group">
                                <label for="restaurant">Заклад</label>
                                <div class="main__selectBox">
                                    <select id="restaurant" name="restaurant" class="main__select">
                                        @foreach($restaurants as $restaurant)
                                            <option value="{{$restaurant->id}}" class="main__clause">
                                                {{$restaurant->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">Категорiя</label>
                                <div class="main__selectBox">
                                    <select id="category" name="category" class="main__select">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" class="main__clause">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_dish">Назва страви</label>
                                <input type="text" name="name" class="form-control" id="name">
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
                        @if (count($errors) > 0)
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
