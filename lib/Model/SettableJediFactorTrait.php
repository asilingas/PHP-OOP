<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.18
 * Time: 10:08
 */

namespace Model;


trait SettableJediFactorTrait
{
    private $jediFactor;

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }
}