<?php

namespace Opmvpc\Formes\Renderers;

use Opmvpc\Formes\Canvas;
use SVG\Nodes\Shapes\SVGRect;
use SVG\SVG;

class SVGRenderer implements Renderer {
    private Canvas $canvas;

    public function __construct(Canvas $canvas) {
        $this->canvas = $canvas;
    }

    public function render(): string {
        $image = new SVG($this->canvas->getWidth(), $this->canvas->getHeight());
        $doc = $image->getDocument();

        // Crée un rectangle pour représenter le fond du canvas
        $rect = new SVGRect(0, 0, $this->canvas->getWidth(), $this->canvas->getHeight());
        $rect->setAttribute('fill', $this->canvas->getCouleur());
        $doc->addChild($rect);

        // Ajoute d'autres éléments SVG pour représenter les formes sur le canvas
        foreach ($this->canvas->getFormes() as $forme) {
            // Vous devrez ajouter du code pour représenter chaque type de forme ici
        }

        return $image->toXMLString();
    }

    public function save(string $path): void {
        file_put_contents($path, $this->render());
    }
}