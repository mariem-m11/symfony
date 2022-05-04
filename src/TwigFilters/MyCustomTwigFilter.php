<?php

namespace App\TwigFilters;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TokenParser\TokenParserInterface;
use Twig\TwigFunction;
use Twig\TwigTest;


class MyCustomTwigFilter extends AbstractExtension

{
    public function getFilters()
    {
        return [
            new TwigFilter('defaultImage', [$this, 'defaultImage'])
        ];
    }

    public function defaultImage(string $path): string {
        if (strlen(trim($path)) == 0) {
            return 'nar.png';
        }
        return $path;
    }


}