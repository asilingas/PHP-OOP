<?php

namespace Service;

use Model\AbstractShip;
use Model\RebelShip;
use Model\Ship;

class ShipLoader
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return AbstractShip[]
     */
    public function getShips()
    {
        try {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e) {
            trigger_error('Database Exception! '.$e->getMessage());
            $shipsData = [];
        }

        $ships = [];
        foreach ($shipsData as $ship) {
            $ships[] = $this->createShipFromData($ship);
        }

        return $ships;
    }

    /**
     * @param $id
     * @return AbstractShip|null
     */
    public function findOneById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);

        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData)
    {
        if ($shipData['team'] == 'rebel') {
            $ship = new RebelShip($shipData['name']);
        } else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }
}
