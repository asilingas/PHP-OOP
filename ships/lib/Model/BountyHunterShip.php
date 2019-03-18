<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.18
 * Time: 10:03
 */

namespace Model;


class BountyHunterShip extends AbstractShip
{
    use SettableJediFactorTrait;

    public function getType()
    {
        return 'Bounty Hunter';
    }

    public function isFunctional()
    {
        return true;
    }
}