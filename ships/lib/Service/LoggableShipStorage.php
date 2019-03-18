<?php
/**
 * Created by PhpStorm.
 * User: new
 * Date: 2019.03.18
 * Time: 10:21
 */

namespace Service;


class LoggableShipStorage implements ShipStorageInterface
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    public function fetchAllShipsData()
    {
        $ships = $this->shipStorage->fetchAllShipsData();

        $this->log(sprintf('Just fetched %s ships', count($ships)));

        return $ships;
    }

    public function fetchSingleShipData($id)
    {
        return $this->shipStorage->fetchSingleShipData($id);
    }

    private function log($message)
    {
        //could do something more useful
        echo $message;
    }
}