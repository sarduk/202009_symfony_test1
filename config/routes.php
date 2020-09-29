<?PHP

// config/routes.php
use App\Controller\BlogApiController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('crea_utenti', '/crea-utenti/')
        ->controller([App\Controller\ProvaInterazioneDoctrine::class, 'crea_utenti'])
        ->methods(['GET', 'HEAD'])
    ;

    $routes->add('prova_twig_paramname', '/prova-twig/{name}')
        ->controller([App\Controller\ProvaTwigController::class, 'prova_twig'])
        ->methods(['GET', 'HEAD'])
    ;

    $routes->add('prova_doctrine', '/prova-doctrine/')
        ->controller([App\Controller\ProvaInterazioneDoctrine::class, 'prova_doctrine'])
        ->methods(['GET', 'HEAD'])
    ;
    
    
//servizio (service) di Symfony che stampi un numero casuale    
//Creare una route “prova-symfony”. La route deve richiamare il servizio di sopra, visualizzare tramite un template twig il numero casuale generato e richiamare la funzione di twig creata “stampaOra”
    $routes->add('prova_symfony', '/prova-symfony/')
        ->controller([App\Controller\ProvaTwigController::class, 'prova_symfony'])
        ->methods(['GET', 'HEAD'])
    ;
    
};
