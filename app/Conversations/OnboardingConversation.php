<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Validator;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Facebook\Extensions\ListTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\Element;

class OnboardingConversation extends Conversation
{
    public function askName()
    {
        $this->ask('What is your name?', function (Answer $answer) {
            $this->bot->userStorage()->save([
                'name' => $answer->getText(),
            ]);

            $this->say('Nice to meet you <b>' . ucwords($answer->getText()).'</b>');
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('What is your email?', function (Answer $answer) {

            $validator = Validator::make(['email' => $answer->getText()], [
                'email' => 'email',
            ]);

            if ($validator->fails()) {
                return $this->repeat('That doesn\'t look like a valid email. Please enter a valid email.');
            }

            $this->bot->userStorage()->save([
                'email' => $answer->getText(),
            ]);

            $this->askMobile();
        });
    }

    public function askMobile()
    {
        $this->ask('Great. What is your mobile?', function (Answer $answer) {
            $validator = Validator::make(['phone_number' => $answer->getText()], [
                'phone_number' => 'required|digits:10',
            ]);

            if ($validator->fails()) {
                return $this->repeat('Please enter a 10 digits phone number.');
            }

            $this->bot->userStorage()->save([
                'mobile' => $answer->getText(),
            ]);

            $this->say('Great!');
            $this->companyList();
        });
    }
    public function askService()
    {
        $question = Question::create('What are you looking for?')
            ->callbackId('select_service')
            ->addButtons([
                Button::create('Submit my listing')->value('submit-listing'),
                Button::create('Find an Agency')->value('find-agency'),
                Button::create('Leave a Review')->value('leave-review'),
                Button::create('Other')->value('other'),
            ]);


        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'service' => $answer->getValue(),
                ]);
                $this->askName();
            }
        });
    }
    public function companyList()
    {
        for ($i=0; $i < 3; $i++) {
            $data[$i] = Element::create('BotMan'.$i.' Laravel Starter')
                ->subtitle('This is the best way to start with Laravel and BotMan')
                ->image('https://botman.io/img/logo.png')
                ->itemUrl('https://github.com/mpociot/botman-laravel-starter');
        }
        $this->say(ListTemplate::create()
            ->useCompactView()
            ->addGlobalButton(ElementButton::create('view more')->url('http://test.at'))
            ->addElements($data)
        );
    }
    public function userInformation($id = null)
    {
        $userinformation = $bot->userStorage()->find($id);
        return $userInformation;
    }
    public function run()
    {
        $this->askService();
    }
}
