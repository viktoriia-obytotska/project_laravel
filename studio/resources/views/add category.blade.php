@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Додати нову категорію</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('add_category')}}" method="post" id="form"
                              class="main__add" enctype= multipart/form-data>
                            @csrf
                            <div class="form-group">
                                <label for="category">Назва категорії</label>
                                <input type="text" name="category" class="form-control" id="category">
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
