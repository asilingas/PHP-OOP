<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.18
 * Time: 09:38
 */

namespace Model;


use Traversable;

class ShipCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{
    /**
     * @var AbstractShip[]
     */
    private $ships;

    public function __construct(array $ships)
    {
        $this->ships = $ships;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->ships);
    }

    public function offsetGet($offset)
    {
        return $this->ships[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->ships[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->ships[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->ships);
    }

    public function removeAllBrokenShips()
    {
        foreach ($this->ships as $key => $ship) {
            if (!$ship->isFunctional()) {
                unset($this->ships[$key]);
            }
        }
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

}