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
            <h2 class="main__title">Список книг</h2>
            <a href="{{route('add_books')}}" data-fancybox="" class="main__button">Добавить книгу</a>
            <a href="{{route('search_books')}}" data-fancybox="" class="main__button">Найти книгу</a>
            <div class="main__container">
                <form action="{{route('saved_books')}}" method="post" id="book_form">
                <table class="main__table ">
                    <tr class=" row  main__inner smells">
                        <th class="main__name">ИД</th>
                        <th class="main__name">Имя</th>
                        <th class="main__name">Год</th>
                        <th class="main__name">Автор</th>
                        <th class="main__name">Издание</th>
                        <th class="main__name">Город</th>
                        <th class="main__name">Действие</th>
                    </tr>
                    @foreach($books as $book)
                        <tr class=" row  main__inner main__info smells">
                            <td>{{$book->id}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->year}}</td>
                            <td>{{$book->first_name}} {{$book->surname}} {{$book->last_name}}</td>
                            <td>{{$book->pub_name}}</td>
                            <td>{{$book->city_name}}</td>
                            <td class="row main__action">
                                <div>
                                    <a href="{{route('edit_books', ['id'=>$book->id])}}">
                                        <img onclick="editBook(9)"
                                             src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-9/24/edit-validated-icon.png"
                                             alt="edit"></a>
                                    <a href="{{route('destroy_books', ['id'=>$book->id])}}">
                                        <img onclick="deleteBook(9)"
                                             src="http://93.119.155.54:1100/img/delete.svg"
                                             alt="delete"></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                </form>
            </div>
        </div>



    </div>
</div>
</body>
</html>
