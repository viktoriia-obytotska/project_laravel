<?php

namespace App\Conversations;
use App\Category;
use App\Restaurant;
use App\Services\BotService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;

class mainConversation extends Conversation
{
    public $response = [];

    public function run ()
    {
        $this->start();
    }

    private function start() {
        $question = BotManQuestion::create("Привіт! На зв'язку BistroChef! Хочеш зробити замовлення?");

        $question->addButtons( [
            Button::create('Так')->value(1),

        ]);
        $this->ask( $question, function (BotManAnswer $answer) {
            if ($answer->isInteractiveMessageReply()) {

                $this->askCategory();
            }
        });
    }

    private function askCategory () {
        $question = BotManQuestion::create("Чудово! Обирай категорію:");

        $categories = Category::get();
        foreach ($categories as $category){
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

        foreach($restaurants->restaurant as $restaurant){
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

    private function getDishes($restaurant)
    {
        $dishes = Restaurant::with('dish')->where('name', '=', $restaurant)->first();

        foreach ($dishes->dish as $dish){
            $attachment = new Image(asset('storage/'.$dish->image));

            $message = OutgoingMessage::create($dish->title)
                ->withAttachment($attachment);


        }
        $this->bot->reply($message);
    }

}
