@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="list-group">
                <a href="{{route('show_restaurants')}}" class="list-group-item list-group-item-action active">
                    Усi заклади
                </a>
                @foreach($categories as $category)
                <a href="{{route('restaurant_category', ['category'=>$category->name])}}"
                   class="list-group-item list-group-item-action">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                    @foreach($restaurants as $restaurant)
                    <div class="card" style="width: 22rem;">
                        <img src="{{asset('storage/'.$restaurant->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$restaurant->name}}</h5>
                            <a href="{{route('edit_restaurant', ['id'=>$restaurant->id])}}"
                               class="card-link">Редагувати</a>
                            <a href="{{route('destroy_restaurant', ['id'=>$restaurant->id])}}"
                               class="card-link">Видалити</a><br>
                            <a href="{{route('show_dishes', ['restaurant'=>$restaurant->name])}}"
                               class="card-link">Показати меню</a>
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
