<?php
namespace Opmvpc\Formes;

class Canvas {
    private float $width;
    private float $height;
    private array $formes;
    private string $couleur;

    public function __construct(float $width, float $height, string $couleur = "#FFFFFF") {
        $this->width = $width;
        $this->height = $height;
        $this->formes = [];
        $this->couleur = $couleur;
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

    public function getCouleur(): string {
        return $this->couleur;
    }

    public function add(Forme $forme): void {
        $this->formes[] = $forme;
    }
}