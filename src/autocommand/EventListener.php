<?php

namespace autocommand;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener
{

    public function __construct($owner)
    {
        $this->owner = $owner;
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        if (empty($this->owner->join_command_data)) return;
        $online = $this->getServer()->getOnlinePlayers();
        $datas = $this->owner->join_command_data;
        for ($i=0; $i < $datas[2]; $i++) {
            if (count($online) == $datas[0][$i]) {
                $this->owner->doAutoCommand($datas[1][$i]);
            }
        }
    }

    public function getConfig()
    {
        return $this->owner->config;
    }

    public function getServer()
    {
        return $this->owner->getServer();
    }

}