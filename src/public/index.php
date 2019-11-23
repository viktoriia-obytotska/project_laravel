<?php

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

session_start();

function example(string $login, int $age)
{

}

switch ($uri) {
    case '/login':
    {
        echo 'login<br>';
    }
    case '/main':
    {
        echo 'main<br>';
        break;
    }
    default:
    {
        echo 'ROUTE NOT FOUND<br>';
        break;
    }
}
