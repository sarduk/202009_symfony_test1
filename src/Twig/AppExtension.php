<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('stampaOra', [$this, 'myStampaOra']),
        ];
    }

    public function myStampaOra($mydate)
    {
        //$date = date_create("2013-03-15");
        $date = date_create($mydate);
        $ret = date_format($date, "d/m/Y H:i:s");
        //$ret = "prova function myStampaOra ".$mytime;
        return $ret;
    }
    
    
}
