<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    @csrf
        <label for="">Name</label><br>
        <input type="text" name="name"><br>
        <label for="">Email</label><br>
        <input type="text" name="email"><br>
        <label for="">Password</label><br>
        <input type="text" name="password"><br>
        <input type="submit" value="REGISTER">
    </form>
</body>
</html>
