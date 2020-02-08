<!DOCTYPE html>
<html lang="ru">
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
        <span class="header__name">Admin Panel</span>
        <span class="header__title">Книги</span>
        <a href="/logout"><img src="http://93.119.155.54:1100/img/Admin.svg" alt="Logout"></a>
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
        @csrf
        <div class="main__wrap" id="primary">
            <h2 class="main__title">Поиск книг</h2>
            <div class="main__container">
                <form action="{{route('search_books')}}" method="get" id="book_form">
                    <p><input type="search" name="query"  placeholder="Поиск по названию"></p><br>
                    <p><input type="search" name="query_aut"  placeholder="Поиск по автору"></p><br>
{{--                    <p><input type="search" name="query_pub"  placeholder="Поиск по издательству"></p><br>--}}
                        <input type="submit" value="Найти">
                    @if(isset($results))
                    <table class="main__table ">
                        <tr class=" row  main__inner smells">
                            <th class="main__name">ИД</th>
                            <th class="main__name">Имя</th>
                            <th class="main__name">Автор</th>
                            <th class="main__name">Издание</th>
                        </tr>
                        @foreach($results as $result)
                            <tr class=" row  main__inner main__info smells">
                                <td>{{$result->id}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{$result->first_name}} {{$result->surname}} {{$result->last_name}}</td>
                                <td>{{}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>
