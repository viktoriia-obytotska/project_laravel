<?php

namespace App\Conversations;

use App\Category;
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


class basketConversation extends Conversation
{


    public function run()
    {
        $this->getBasket();
    }


    private function keyboard()
    {
        $keyboard = [
            ['Кошик']
        ];
        Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
    }

    private function getBasket()
    {
        $question = BotManQuestion::create("Ваше замовлення:");
        $user = $this->bot->userStorage()->find();
        $order = $user->get('order_v2');
        $dishes = json_decode($order, true);
        $lists = Dish::whereIn('id', $dishes)->get();

//        $question->addButton(Button::create($order)->value('dish'));
        foreach ($lists as $list) {
            $info = $list->title;
            $info .= $list->price . 'грн';
            $question->addButtons([
                Button::create($info)->value('dish'),
//            Button::create($user->get('test'))->value('dish2'),

            ]);


        }
        $question->addButton(Button::create('Оформити замовлення✔️' . $list->price . 'грн')->value('checkout'));
        $this->ask($question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'dish':
                    {

                        break;
                    }
                    case 'checkout':
                    {
                        $this->askPhone();
                        break;
                    }
                }
            }
        });
    }

    private function askPhone()
    {
        $this->ask('Введiть свiй номер телефону', function (BotManAnswer $answer) {
            $this->bot->userStorage()->save([
                'phone' => $answer->getText(),
            ]);


            $this->askAddress();

        });
    }

    private function askAddress()
    {
        $this->ask('Введiть адресу доставки (вулиця, будинок, квартира)' . PHP_EOL .
            'Наприклад: пр. Миру, 42А, 15', function (BotManAnswer $answer) {
            $this->bot->userStorage()->save([
                $data = explode(',', $answer->getText()),
                'street' => $data[0],
                'house' => $data[1],
                'apartment' => $data[2]
            ]);

            $this->say('Чудово!');
            $this->askTime();

        });
    }

    private function askTime()
    {
        $this->ask('Введiть час доставки замовлення', function (BotManAnswer $answer) {
            $this->bot->userStorage()->save([
                'time' => $answer->getText(),
            ]);

            $this->bot->startConversation(new SaveConversation());
            $this->getInfo();

        });
    }

    private function getInfo()
    {
        $this->say('Ваше замовлення прийнято!' . PHP_EOL . 'Очiкуйте на телефонний дзвiнок менеджера!');
    }
}