<?php

namespace Opmvpc\Formes\Renderers;

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Rectangle;
use Opmvpc\Formes\Cercle;
use Opmvpc\Formes\Ligne;
use Opmvpc\Formes\Polygone;
use SVG\Nodes\Shapes\SVGCircle;
use SVG\Nodes\Shapes\SVGLine;
use SVG\Nodes\Shapes\SVGPolygon;
use SVG\Nodes\Shapes\SVGRect;
use SVG\SVG;

class SVGRenderer implements Renderer
{
    private Canvas $canvas;

    public function __construct(Canvas $canvas)
    {
        $this->canvas = $canvas;
    }

    public function render(): string
    {
        $image = new SVG($this->canvas->getWidth(), $this->canvas->getHeight());
        $doc = $image->getDocument();

        $square = new SVGRect(0, 0, $this->canvas->getWidth(), $this->canvas->getHeight(), $this->canvas->getCouleur());
        $doc->setStyle('fill', $this->canvas->getCouleur());
        $doc->addChild($square);

        //  formes
        foreach ($this->canvas->getFormes() as $forme) {

 if(get_class($forme) === Rectangle::class) {
     $rectangle= new SVGRect($forme->getPoint()->getX(), $forme->getPoint()->getY(), $forme->getWidth(), $forme->getHeight(), $forme->getCouleur());
$rectangle->setStyle('fill', $forme->getCouleur());
     $doc->addChild($rectangle);
 }
        elseif (get_class($forme) === Cercle::class) {
                //  cercle
                $circle = new SVGCircle($forme->getCentre()->getX(), $forme->getCentre()->getY(), $forme->getRayon());
                $circle->setStyle('fill', $forme->getCouleur());
                $doc->addChild($circle);

            }  elseif (get_class($forme) === Ligne::class) {
                // Rendu ligne
                $line = new SVGLine(
                    $forme->getPoint1()->getX(), $forme->getPoint1()->getY(),
                    $forme->getPoint2()->getX(), $forme->getPoint2()->getY()
                );
                $line->setStyle('stroke', $forme->getCouleur()); // Utilisez 'stroke' au lieu de 'fill'
                $doc->addChild($line);
            //  polygone
            } elseif (get_class($forme) === Polygone::class) {
                $points = [];
                foreach ($forme->getPoints() as $point) {
                    $points[] = [$point->getX(), $point->getY()];
                }
                $polygon = new SVGPolygon($points);
                $polygon->setStyle('fill', $forme->getCouleur());
                $doc->addChild($polygon);
            }
        }

        return $image->toXMLString();
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->render());
    }
}
