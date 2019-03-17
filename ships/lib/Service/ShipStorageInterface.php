<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.17
 * Time: 09:46
 */

interface ShipStorageInterface
{
    /**
     * Returns an array of ship arrays, with keys id, name, weaponPower, strength.
     *
     * @return array
     */
    public function fetchAllShipsData();

    /**
     * @param int $id
     * @return array()
     */
    public function fetchSingleShipData($id);
}