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

        $address = Address::firstOrCreate(['address'=>$user->get('address')]);
        $address->save();

        $client = new Client();
        $client->phone = $user->get('phone');
        $client = Client::firstOrCreate(['first_name'=>$this->bot->getUser()->getFirstName(),
                                         'last_name'=>$this->bot->getUser()->getLastName()]);

        $client->save();

        $orders = new Order();
        $orders->client_id = $client->id;
        $orders->address_id = $address->id;
        $orders->amount = $user->get('sum')+45;
        $orders->time_delivery = $user->get('time');
        $orders->save();

//        $dishes = Dish::find($orders->id);
//        $order_v2 = $user->get('order_v2');
//        $values = json_decode($order_v2, true);
//        foreach ($values as $value)
//        {
//            $dishes->dish_id = $value;
//        }
//        $dishes->order()->save($dishes);


        }


}
