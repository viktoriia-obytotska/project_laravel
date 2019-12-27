<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Погода в {{$city}}</title>
</head>
<body>
    <h1>Прогноз погоды на {{$weather ['today']}}</h1>
<ul>
    <li>Температура {{$weather ['temp']}}</li>
    <li>Скорость ветра {{$weather ['wind'] ['speed']}}</li>
    <li>Направление ветра {{$weather ['wind'] ['direction']}}</li>
</ul>


</body>
</html>
