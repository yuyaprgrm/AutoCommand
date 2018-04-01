<?php
/**
 * Created by PhpStorm.
 * User: tokai
 * Date: 2018/04/01
 * Time: 18:53
 */

namespace autocommand\condition;


class PlayerCondition
{

    const DEFAULT_MIN = 0;
    const DEFAULT_MAX = -1;

    private $isEnable;
    private $max; /** @var int */
    private $min; /** @var int */

    public function __construct(?array $playerCondition)
    {
        $this->isEnable = is_array($playerCondition); // nullが来た時点で false

        if($this->isEnable()) { // Enableでないときは処理をしない
            $this->min = intval($playerCondition["min"] ?? PlayerCondition::DEFAULT_MIN);
            $this->max = intval($playerCondition["min"] ?? PlayerCondition::DEFAULT_MAX);
        }
    }

    public function isEnable()
    {
        return $this->isEnable;
    }
}