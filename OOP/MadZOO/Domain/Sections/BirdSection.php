<?php

namespace Zoo\Domain\Sections;

use Zoo\Domain\Person\Client;
use Zoo\Logger\Logger;
use Zoo\Domain\Cells\CellBird;

class BirdSection extends Section
{
    public function clientLog(Client $client): bool
    {
        #region FilterClients
        if (count($this->clients) >= self:: MAXCLIENT) {
            return false;
        }
        #endregion
        $animalName = $client->interest->name;
        $animal = $this->findAnimal($animalName);
        if ($animal == null) {
            return false;
        }
        $client->animal = $animal;
        $this->log->clientGetAnimal($client->name, $animalName);
        $animal->incrementViews($this->log);
        $this->clients[] = $client;
        return true;
    }

    public function clientLogOut(Client $client)
    {
        $this->addAnimal([$client->animal]);
        $animalName = $client->animal->name;
        $key = array_search($client, $this->clients);
        unset($this->clients[$key]);
        #region LogSection
        $this->log->clientSetAnimal($client->name, $animalName);
        #endregion
        return;
    }

    public function __construct(Logger $log, $arraybirds)
    {
        parent::__construct($log);
        $this->cells[] = new CellBird();
        $this->addAnimal($arraybirds);
    }
#region CRUD
    public function addAnimal(array $arraybirds)
    {
        foreach ($arraybirds as $animal) {
            $keyLastCell = array_key_last($this->cells);
            $cell = $this->cells[$keyLastCell];
            if (count($cell->animals) >= self::MAXANIMAL) {
                $keyLastCell = array_push($this->cells, new CellBird()) - 1 ;
            }
            $this -> cells[$keyLastCell]->addAnimal($animal);
        }
    }
    public function findAnimal(?string $name = null)
    {
        foreach ($this->cells as $cell) {
            $animal = $cell->findAnimal($name);
            if ($animal != null) {
                return $animal;
            }
        }
        return null;
    }
#endregion
}
