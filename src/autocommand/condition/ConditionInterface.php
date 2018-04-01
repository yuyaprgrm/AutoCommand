<?php
/**
 * Created by PhpStorm.
 * User: tokai
 * Date: 2018/04/01
 * Time: 19:55
 */

namespace autocommand\condition;


interface ConditionInterface
{
    /**
     * コンディションが有効化されているかを返します
     * @return bool
     */
    public function isEnable(): bool;

    /**
     * コンディションを満たすかどうかが返ります
     * @param ConditionInterface $condition
     * @return bool
     */
    public function equal(ConditionInterface $condition): bool;

}