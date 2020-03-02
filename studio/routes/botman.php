<?php
use App\Http\Controllers\BotManController;
use App\Conversations\mainConversation;

$botman = resolve('botman');

$botman->hears('/start', 'App\Http\Controllers\BotManController@startConversation');

//$botman->('hello', BotManController::class.'@startConversation');
