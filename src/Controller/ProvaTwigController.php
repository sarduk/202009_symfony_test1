<?php

// src/Controller/ProvaTwigController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProvaTwigController extends AbstractController
{
    
    //
    public function prova_twig($name)
    {

        /*return new Response(
            '<html><body>prova_twig, name: '.$name.'</body></html>'
        );*/

        /*return $this->render('base.html.twig', [
                'name' => $name,
        ]);*/
        
        return $this->render('prova_twig/prova-twig.html.twig', [
                'name' => $name,
        ]);
        
        
    }
}
