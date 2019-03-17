<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.17
 * Time: 08:47
 */

namespace Model;

class BrokenShip extends AbstractShip
{
    public function getJediFactor()
    {
        return 0;
    }

    public function getType()
    {
        return 'Broken';
    }

    public function isFunctional()
    {
        return false;
    }
}