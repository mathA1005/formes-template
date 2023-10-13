<?php
namespace Opmvpc\Formes;

class Canvas extends Forme {
    private $width;
    private $height;
    private $formes = [];

    public function __construct(float $width, float $height, string $couleur = '#FFFFFF') {
        $this->width = $width;
        $this->height = $height;
        $this->setCouleur($couleur);
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getFormes(): array {
        return $this->formes;
    }

    public function add(Forme $forme) {
        $this->formes[] = $forme;
    }

    public function setCouleur(string $couleur) {
        $this->couleur = $couleur;
    }

    public function getCouleur(): string {
        return $this->couleur;
    }
}