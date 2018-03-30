<?php

namespace enablecommander;

use pocketmine\plugin\PluginBase;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;

class Main extends PluginBase
{

    public function onEnable()
    {
        $this->loadSetting();
        $sender = new ConsoleCommandSender();
        $setting = $this->config->get("コマンド");
        if (!empty($setting)) {
            foreach ($setting as $command) {
                $this->getServer()->dispatchCommand($sender, $command);
                $this->getLogger()->info("§6".$command." §aコマンドを実行しました");
            }
        } else {
            $this->getLogger()->info("§b自動生成されたconfig.ymlからコマンドを設定してください");
        }
        $this->getLogger()->info("§b役目を果たしたのでプラグインを無効化します");
        $this->getServer()->getPluginManager()->disablePlugin($this);
    }

    public function loadSetting()
    {
        $this->saveDefaultConfig();
        $this->reloadConfig();
        if(!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0744, true);
        $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
    }
}