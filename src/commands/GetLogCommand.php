<?php


namespace yevheniikukhol\HideBot\commands;


use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use yevheniikukhol\HideBot\classes\Log;


class GetLogCommand extends Command
{
    protected $name = "getLog";
    protected $description = "This command will show you what command you select before";

    public function handle()
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $response = Log::get();
        $this->replyWithMessage(['text'=>$response]);
    }

}