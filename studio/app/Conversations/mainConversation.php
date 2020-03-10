<?php

namespace App\Conversations;

use App\Address;
use App\Category;
use App\Client;
use App\Dish;
use App\Order;
use App\Restaurant;
use App\Services\BotService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;

class mainConversation extends Conversation
{
    public $response = [];

    public function run()
    {
        $this->start();
    }

    private function start()
    {
        $user = $this->bot->getUser();
        $name = $user->getFirstName();
        $question = BotManQuestion::create("Привіт" . PHP_EOL . $name . "! Хочеш зробити замовлення?");

        $question->addButtons([
            Button::create('Так')->value(1),

        ]);
        $this->ask($question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {

                $this->askCategory();
            }
        });
    }

    private function askCategory()
    {
        $question = BotManQuestion::create("Чудово! Обирай категорію:");

        $categories = Category::get();
        foreach ($categories as $category) {
            $question->addButtons([
                Button::create($category->name)->value($category->name),
            ]);
        }
        $this->ask($question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->getRestaurants($answer->getValue());
            }
        });
    }

    private function getRestaurants($category)
    {
        $question = BotManQuestion::create("Чудово! Обирай ресторан:");
        $restaurants = Category::with('restaurant')->where('name', '=', $category)->first();

        foreach ($restaurants->restaurant as $restaurant) {
            $question->addButtons([
                Button::create($restaurant->name)->value($restaurant->name),
            ]);
        }
        $this->ask($question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {

                $this->getDishes($answer->getValue());

            }
        });
    }

    private function getDishes($restaurant, $page = 1)
    {
        $dishes = Dish::select('dishes.*')
            ->leftJoin('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
            ->where('restaurants.name', '=', $restaurant)
            ->limit(2)
            ->offset($page * 2 - 2)
            ->get();

        foreach ($dishes as $dish) {
            $picture = new Image(asset('storage/' . $dish->image));
            $menu = 'Назва: ' . $dish->title . PHP_EOL;
            $menu .= 'Опис: ' . $dish->description . PHP_EOL;
            $menu .= 'Ціна: ' . $dish->price . 'грн';

            $message = OutgoingMessage::create($menu)
                ->withAttachment($picture);

            $keyboard = Keyboard::create()
                ->type(Keyboard::TYPE_INLINE)
                ->addRow(KeyboardButton::create('Додати до замовлення')->callbackData($dish->id))
                ->toArray();


            $this->ask($message, function (BotManAnswer $answer) use ($restaurant) {
                if ($answer->isInteractiveMessageReply()) {
                    $order = $this->bot->userStorage()->find()->get('order_v2');
                    if(!$order){
                        $order = [];
                    }else {
                        $order = json_decode($order, true);
                    }
                    $order[] = $answer->getValue();

                    $this->bot->userStorage()->save([
                        'order_v2' => json_encode($order),
                    ]);

                    $this->askOrder();
                }
            }, $keyboard);
        }
    }

    private function countDish(){
        $keyboard = Keyboard::create()
            ->type(Keyboard::TYPE_INLINE)
            ->addRow(KeyboardButton::create('-')->callbackData('minus'),
                KeyboardButton::create('')->callbackData('count'),
                KeyboardButton::create('+')->callbackData('plus'))
            ->toArray();
    }

    private function askOrder()
    {
        $question = BotManQuestion::create("Це все?" . PHP_EOL . "Можливо ще щось?");

        $question->addButtons([
            Button::create('Так')->value(1),
            Button::create('Моє замовлення')->value('order')

        ]);
        $this->ask($question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if($answer->getValue() === 'order'){
                    $this->bot->startConversation(new basketConversation());
                } else {
                    $this->askCategory();
                }

            }
        });
    }


}
