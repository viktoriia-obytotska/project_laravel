<?php
session_start();
$login = $_POST['login'];
$pass = $_POST['password'];
$email=$_POST['email'];

$connect = mysqli_connect('mysql','root', 'rootpass', 'beetroot', '3306');

if(!$connect){
    echo 'error connect';
}
else {
    echo 'connected';
}
$query = "INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, $login, $email, $pass)";
$users = mysqli_query($connect, $query);


if(isset($login) && isset ($email) && isset($pass)){
    $sql = "SELECT count(*) FROM `users` WHERE `login` = '".$login."' AND `email` = '".$email."' AND `password` = '".$pass."'";
    $log = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($log);
    if($row['count(*)']>0){
        $_SESSION['auth_user'] = $row;

        echo 'welcome user';
    }else{
        echo 'wrong login or password';
    }
}
