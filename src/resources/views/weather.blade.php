<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
</head>
<body>
<form method="post" action="{{route('search')}}">
    @csrf
    <input type="text" class="textbox" placeholder="Search" name="name">
    <input type="submit" value="search">
</form>

</body>
</html>

