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
        $this->replyWithMessage(['text' => 'Hello! Welcome to our bot, Here are our available commands:']);
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->triggerCommand('help');
    }

}