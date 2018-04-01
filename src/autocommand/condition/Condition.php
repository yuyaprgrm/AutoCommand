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

    const DEFAULT_PLAYER_MIN = 0;
    const DEFAULT_PLAYER_MAX = -1;


    private $players;


    public function __construct(array $conditionData)
    {
    }

    private function parse(array $conditionData)
    {
    }
}
