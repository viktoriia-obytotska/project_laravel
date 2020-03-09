<?php
use App\Http\Controllers\BotManController;
use App\Conversations\mainConversation;
use App\Conversations\basketConversation;

$botman = resolve('botman');

$botman->hears('/start', 'App\Http\Controllers\BotManController@startConversation');

$botman->hears('/order', 'App\Http\Controllers\BotManController@orderConversation');
