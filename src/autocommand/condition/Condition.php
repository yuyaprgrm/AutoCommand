<?php
/**
 * Created by PhpStorm.
 * User: tokai
 * Date: 2018/04/01
 * Time: 18:18
 */

namespace autocommand\condition;

class Condition
{

    private $players;


    public function __construct(array $conditionData)
    {
        $this->parse($conditionData);
    }

    private function parse(array $conditionData)
    {
        $this->players = new PlayerCondition($conditionData["player"] ?? null);
    }
}