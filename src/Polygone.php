<?php

namespace Opmvpc\Formes;

class Polygone extends Forme {
    private $points;

    public function __construct(array $points, string $couleur = '#000000') {
        parent::__construct($couleur);
        $this->points = $points;
    }

    public function getPoints(): array {
        return $this->points;
    }
}
