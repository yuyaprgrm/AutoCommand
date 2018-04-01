<?php

namespace autocommand\task;

use pocketmine\scheduler\PluginTask;

class AutoCommandTask extends PluginTask
{

    public function __construct($owner, $data)
    {
        parent::__construct($owner);
        $this->commands = $data;
    }

    public function onRun(int $tick)
    {
        $this->getOwner()->doAutoCommand($this->commands);
    }

}