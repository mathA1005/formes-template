<?php

namespace Opmvpc\Formes;

abstract class Forme {
    protected $couleur;

    public function __construct(string $couleur = '#FFFFFF') {
        $this->couleur = $couleur;
    }

    public function setCouleur(string $couleur) {
        $this->couleur = $couleur;
    }

    public function getCouleur(): string {
        return $this->couleur;
    }

}
