<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Books </title>
    <link href="http://93.119.155.54:1100/css/style.css?ver=05092019" rel="stylesheet">
    <link href="http://93.119.155.54:1100/css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="http://93.119.155.54:1100/css/jquery.fancybox.min.css"/>
</head>
<body>
<header class="header ">
    <div class="header__wrap row">
        <span class="header__name"> Admin Panel</span>
        <span class="header__title">Книги</span>
        <a href="/admin/logout"><img src="http://93.119.155.54:1100/img/Admin.svg" alt="Logout"></a>
    </div>
</header>
<div class="row content">
    <div class="sidebar">
        <div class="sidebar__heading">
            <img src="http://93.119.155.54:1100/img/avatar.svg" alt="Avatar" class="sidebar__avatar">
            <span>Добро пожаловать, admin</span>
        </div>
        <a class="sidebar__menu"><img src="http://93.119.155.54:1100/img/menu.svg" alt="Menu-open"></a>
        <ul class="sidebar__list">
            <li>
                <a href="main.html" class="sidebar__link">Книги</a>
            </li>
        </ul>
    </div>
    <div class="main">

        <div class="main__wrap" id="primary">
            <h2 class="main__title">Добавить книгу</h2>
            <div id="modalAdd">
<form action="{{route('add_books')}}" method="post" id="book_form" class="main__add" enctype= multipart/form-data>
    @csrf
    <div class=" main__item">
        <label class="main__clause">Имя </label>
        <input id="name" name="name" type="text" class="main__input" placeholder="Введите имя">
    </div>
    <div class=" main__item">
        <label class="main__clause">Год </label>
        <input id="year" name="year" type="text" class="main__input" placeholder="Введите год">
    </div>
    <div class=" main__item">
        <label class="main__clause">Издание</label>
        <div class="main__selectBox">
            <select id="publication" name="publication" class="main__select">
                @foreach($publications as $publication)
                <option value="{{$publication->id}}" class="main__clause">
                    {{$publication->city_id}} {{$publication->owner_id}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class=" main__item">
        <label class="main__clause">Автор</label>
        <div class="main__selectBox">
            <select id="author" name="author" class="main__select">
                @foreach($authors as $author)
                <option value="{{$author->id}}" class="main__clause">
                    {{$author->first_name}} {{$author->surname}} {{$author->last_name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row main__item main__location">
        <button id="save_books_button" type="submit" class="main__save">Сохранить</button>
    </div>
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
</body>
</html>
