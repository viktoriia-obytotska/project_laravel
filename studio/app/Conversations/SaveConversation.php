<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Address;
use App\Category;
use App\Client;
use App\Dish;
use App\Order;
use App\Restaurant;
use App\Services\BotService;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;

class SaveConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->save();
    }

    private function save(){
        $user = $this->bot->userStorage()->find();

        $address = new Address();
        $address->street = $user->get('street');
        $address->house = $user->get('house');
        $address->apartment = $user->get('apartment');
        $address->save();

        $client = new Client();
        $client->first_name = $this->bot->getUser()->getFirstName();
        $client->last_name = $this->bot->getUser()->getLastName();
        $client->phone = $user->get('phone');
        $client->save();

        $order = new Order();
        $order->client_id = $client->id;
        $order->dish_id = $user->get('order');
        $order->amount = $user->get('amount');
        $order->delivery_sum = 45;
        $order->time_delivery = $user->get('time');
        $order->address_id = $address->id;
        $order->save();


    }

}
