<?php

namespace Opmvpc\Formes;

abstract class Forme {
    protected string $couleur;

    public function __construct(string $couleur = '#FFFFFF') {
        $this->couleur = $couleur;
    }


    public function getCouleur(): string {
        return $this->couleur;
    }

}
