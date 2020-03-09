@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="list-group">
                <a href="{{route('show_dish', ['restaurant'=>$dishes->name])}}" class="list-group-item list-group-item-action active">
                    Усi страви
                </a>
                @foreach($categories as $category)
                    <a href="{{route('dish_category', ['category'=>$category->name])}}"
                       class="list-group-item list-group-item-action">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                        <div class="card">
                            <div class="card-body">
                                @foreach($dishes->dish as $dish)
                                    <div class="card mb-3" style="max-width: 680px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="{{asset('storage/'.$dish->image)}}" height="160" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$dish->title}}</h5>
                                                    <p class="card-text">{{$dish->description}}</p>
                                                    <p class="card-text">{{$dish->price}} грн</p>
                                                    <a href="{{route('edit_dish', ['id'=>$dish->id, 'restaurant'=>$dish->restaurant_id])}}"
                                                       class="card-link">Редагувати</a>
                                                    <a href="{{route('destroy_dish', ['id'=>$dish->id])}}"
                                                       class="card-link">Видалити</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
