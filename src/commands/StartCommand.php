<?php


namespace yevheniikukhol\HideBot\commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{

    protected $name = "start";
    protected $description = "Starting command";

    public function handle()
    {
        $res = $this->getWebhookUpdates();
        $this->replyWithMessage(['text' => 'Hello! Welcome to our bot, Here are our available commands:']);
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        do{
            $text = $res["message"]["text"];
        }
        while($text);
        $this->replyWithMessage(['text' => $text]);



        $this->triggerCommand('help');

    }

}