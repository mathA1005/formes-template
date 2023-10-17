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

        foreach ($this->canvas->getFormes() as $forme) {
            if ($forme instanceof Rectangle) {
                $rect = new SVGRect(
                    $forme->getPoint()->getX(),
                    $forme->getPoint()->getY(),
                    $forme->getWidth(),
                    $forme->getHeight(),
                    $forme->getCouleur()
                );
                $rect->setStyle('fill', $forme->getCouleur());
                $doc->addChild($rect);
            } elseif ($forme instanceof Cercle) {
                $circle = new SVGCircle(
                    $forme->getCentre()->getX(),
                    $forme->getCentre()->getY(),
                    $forme->getRayon(),
                    $forme->getCouleur()
                );
                $circle->setStyle('fill', $forme->getCouleur());
                $doc->addChild($circle);
            } elseif ($forme instanceof Ligne) {
                $line = new SVGLine(
                    $forme->getPoint1()->getX(),
                    $forme->getPoint1()->getY(),
                    $forme->getPoint2()->getX(),
                    $forme->getPoint2()->getY()
                );
                $line->setStyle('fill', $forme->getCouleur());
                $doc->addChild($line);
            } elseif ($forme instanceof Polygone) {
                $polyArray = [];
                foreach ($forme->getPoints() as $mesPoints) {
                    $polyArray[] = [$mesPoints->getX(), $mesPoints->getY()];
                }

                $polygon = new SVGPolygon();
                foreach ($polyArray as $point) {
                    $polygon->addPoint($point[0], $point[1]);
                }

                $polygon->setStyle('fill', $forme->getCouleur());
                $doc->addChild($polygon);
            }
        }
        return $image->toXMLString();
    }

    public function save(string $path): void
    {
        $svgContent= $this->render();
        file_put_contents($path, $svgContent);
    }
}