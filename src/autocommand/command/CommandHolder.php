<?php
/**
 * Created by PhpStorm.
 * User: tokai
 * Date: 2018/04/01
 * Time: 18:09
 */

namespace autocommand\command;


use autocommand\Condition;
use pocketmine\command\CommandSender;

class CommandHolder
{
    /** @var Condition */
    private $condition;


    public function execute(CommandSender $sender): void
    {
        if(!$this->isExecuteConditionMatched()) {
            return;
        }

    }

    private function isExecuteConditionMatched() :bool
    {
        return false; //TODO: 条件を確認する処理
    }
}