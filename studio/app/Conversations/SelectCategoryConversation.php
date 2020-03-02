<?php

namespace App\Conversations;

use App\Category;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class SelectCategoryConversation extends Conversation
{


   public function askCategory()
   {
       $category = Category::get();

       $question = Question::create('Хочеш перекусити? Обирай категорiю закладу:')
           ->callbackId('select_category')
           ->addButtons([
               Button::create($category->name)->value($category->name),
           ]);
       $this->ask($question, function (Answer $answer){
           if($answer->isInteractiveMessageReply()){
               $this->bot->userStorage()->save()([
                   'category'=>$answer->getValue(),
               ]);
   }
       });
   }
    public function run()
    {
        $this->askCategory();
    }
}
