<?php


namespace yevheniikukhol\HideBot\commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class SetPassword
 * @package yevheniikukhol\HideBot\commands
 * This command just for displayed message "enter password". Business logic is in
 */

class SetPassword extends Command
{

    protected $name = "setPassword";
    protected $description = "Create user for use that bot ";

    public function handle()
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $commands = $this->getTelegram()->getCommands();

        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $response]);
    }

}