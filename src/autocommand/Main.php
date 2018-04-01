<?php

namespace autocommand;

use pocketmine\plugin\PluginBase;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;

use autocommand\EventListener;
use autocommand\task\AutoCommandTask;

class Main extends PluginBase
{

    public $commander;

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->loadSetting();
        $this->loadCommandSender();
        print_r($this->config->get("参加人数"));

        if (!empty($enable = $this->config->get("起動時"))) {
            $this->doAutoCommand($enable);
        }

        if (!empty($delay = $this->config->get("遅延"))) {
            $this->startCommandTask($delay);
        }

        if (!empty($join = $this->config->get("参加人数"))) {
            $datas = $this->getSortedArrayOfUpperLayersOfConfig($join);
            $this->join_command_data = $datas;
        }
    }


/*----OTHER METHOD----*/

    public function doAutoCommand($commands)
    {
        $sender = $this->commander;
        foreach ($commands as $command) {
            $this->getServer()->dispatchCommand($sender, $command);
            $this->getLogger()->info("§6".$command." §aコマンドを実行しました");
        }
    }

    public function startCommandTask($delay)
    {
        $datas = $this->getSortedArrayOfUpperLayersOfConfig($delay);
        for ($i=0; $i < $datas[2]; $i++) {
            $task = new AutoCommandTask($this, $datas[1][$i]);
            $this->getServer()->getScheduler()->scheduleDelayedTask($task, $datas[0][$i] * 20);
        }
    }

    public function getSortedArrayOfUpperLayersOfConfig($data)
    {
        $keys = array_keys($data);
        foreach ($keys as $value) {
            $rm_p = str_replace("p", "", $value);
            $rm_p_s = str_replace("s", "", $rm_p);
            $num_keys[] = $rm_p_s;
        }
        $array[] = $num_keys;
        $array[] = array_values($data);
        $array[] = count($keys);
        return $array;
    }


/*----LOADING----*/

    public function loadCommandSender()
    {
        $this->commander = new ConsoleCommandSender();
    }

    public function loadSetting()
    {
        $this->saveDefaultConfig();
        $this->reloadConfig();
        if(!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0744, true);
        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
    }

}