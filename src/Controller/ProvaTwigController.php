<?php

// src/Controller/ProvaTwigController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\RandomGenerator;

class ProvaTwigController extends AbstractController
{
    
    public function prova_twig($name)
    {

        /*return new Response(
            '<html><body>prova_twig, name: '.$name.'</body></html>'
        );*/

        return $this->render('prova_twig/prova-twig.html.twig', [
                'name' => $name,
        ]);
        
    }

    
    public function prova_symfony(RandomGenerator $randomGenerator)
    {

        $date1 = "2019-03-15 11:02:01";
        $myrndnr = $randomGenerator->getRandomInt(100);
        
        return $this->render('prova_twig/prova-symfony-ora-rndnr.html.twig', [
            'date1' => $date1,
            'myrndnr' => $myrndnr,
        ]);

        /*return new Response(
            'Ok prova_symfony'
        );*/
        
    }


}
