<?php
session_start();
if(!empty($_SESSION['auth_user'])){
    echo 'access denied';
}
require_once 'users.phtml';
