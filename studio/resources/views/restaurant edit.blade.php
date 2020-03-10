@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Редагувати</h3></div>
                <div class="card-body">
                    <form action="{{route('edit_restaurant', ['id'=>$restaurants->id])}}"
                          method="post" id="form" class="main__add" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label for="name_restaurant">Назва закладу</label>
                            <input type="text" name="name"
                                   value="{{$restaurants['name']}}"
                                   class="form-control" id="name" >
                        </div>
                        <div class=" main__item">
                            <label id="image_label" class="main__clause">Обрати зображення</label>
                            <input id="image" value="{{$restaurants['image']}}" name="image" type="file">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
