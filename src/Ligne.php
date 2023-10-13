<?php

namespace Opmvpc\Formes;

class Ligne extends Forme {
    private $point1;
    private $point2;

    public function __construct(Point $point1, Point $point2, string $couleur = '#000000') {
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->setCouleur($couleur);
    }

    public function getPoint1(): Point {
        return $this->point1;
    }

    public function getPoint2(): Point {
        return $this->point2;
    }
}
