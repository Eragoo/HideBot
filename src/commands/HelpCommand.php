<?php


namespace yevheniikukhol\HideBot\commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{

    protected $name = "help";
    protected $description = "Shows a list of available commands";

    public function handle()
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $commands = $this->getTelegram()->getCommands();
        $response = ' ';
        foreach ($commands as $name => $command) {
           $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $response]);

    }

}