<?php

namespace Opmvpc\Formes;

class Cercle extends Forme {
    private $rayon;
    private $centre;

    public function __construct(Point $centre, float $rayon, string $couleur = '#000000') {
        $this->centre = $centre;
        $this->rayon = $rayon;
        parent::__construct($couleur);
    }

    public function getRayon(): float {
        return $this->rayon;
    }

    public function getCentre(): Point {
        return $this->centre;
    }

}

