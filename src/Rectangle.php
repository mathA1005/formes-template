<?php

namespace Opmvpc\Formes;

class Rectangle extends Forme {



    private $point;
    private $width;
    private $height;

    public function __construct(Point $point, float $width, float $height, string $couleur = '#000000') {
        $this->point = $point;
        $this->width = $width;
        $this->height = $height;
        $this->setCouleur($couleur);
    }

    public function getPoint(): Point {
        return $this->point;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }
}

