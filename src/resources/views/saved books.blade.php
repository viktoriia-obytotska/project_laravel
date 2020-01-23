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
            <div class="main__container">
                <table class="main__table ">
                    <tr class=" row  main__inner smells">
                        <th class="main__name">ИД</th>
                        <th class="main__name">Имя</th>
                        <th class="main__name">Год</th>
                        <th class="main__name">Автор</th>
                        <th class="main__name">Издание</th>
                        <th class="main__name">Город</th>
                        <th class="main__name">Владелец</th>
                        <th class="main__name">Дата создания</th>
                        <th class="main__name">Дата обновления</th>
                        <th class="main__name">Действие</th>
                    </tr>
                    @foreach($items as $item)
                        <tr class=" row  main__inner main__info smells">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->year}}</td>
                            <td>{{$item->first_name}} {{$item->surname}} {{$item->last_name}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td class="row main__action">
                                <div>
                                    @foreach($dels as $del)
                                    <a href="{{route('delete_books', ['id'=> $del->id])}}">
                                        <img onclick="deleteBook(9)"
                                             src="http://93.119.155.54:1100/img/delete.svg"
                                             alt="delete"></a>
                                        @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>



    </div>
</div>
</body>
</html>
