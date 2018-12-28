<?php

namespace App\Http\Controllers;

use App\Conversations\OnboardingConversation;
use BotMan\BotMan\BotMan;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    public function tinker()
    {
        return view('tinker');
    }

    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new OnboardingConversation());
    }
}
