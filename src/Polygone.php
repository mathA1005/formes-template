<?php

namespace Opmvpc\Formes;

class Polygone extends Forme {
    private $points;

    public function __construct(array $points, string $couleur = '#000000') {
        $this->points = $points;
        $this->setCouleur($couleur);
    }

    public function getPoints(): array {
        return $this->points;
    }
}
