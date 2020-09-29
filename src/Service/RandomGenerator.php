<?php

namespace App\Service;

class RandomGenerator
{
    public function getRandomInt($max)
    {
        $ret = rand (0, $max );
        return $ret;
    }
}