@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Редагувати</h3></div>
                <div class="card-body">
                    <form action="{{route('edit_dish', ['id'=>$dishes->id, 'restaurant'=>$dishes->restaurant_id])}}"
                          method="post" id="form" class="main__add" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label for="name">Назва страви</label>
                            <input type="text" name="name"
                                   value="{{$dishes['title']}}"
                                   class="form-control" id="name" >
                        </div>
                        <div class="form-group">
                            <label for="description">Опис</label>
                            <input type="text" name="description"
                                   value="{{$dishes['description']}}"
                                   class="form-control" id="description" >
                        </div>
                        <div class="form-group">
                            <label for="price">Цiна</label>
                            <input type="text" name="price"
                                   value="{{$dishes['price']}}"
                                   class="form-control" id="price">
                        </div>
                        <div class=" main__item">
                            <label id="image_label" class="main__clause">Обрати зображення</label>
                            <input id="image" value="{{asset('storage/'.$dishes['image'])}}" name="picture" type="file">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
