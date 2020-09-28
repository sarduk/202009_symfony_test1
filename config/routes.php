<?PHP

// config/routes.php
use App\Controller\BlogApiController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('prova_twig_paramname', '/prova-twig/{name}')
        ->controller([App\Controller\ProvaTwigController::class, 'prova_twig'])
        ->methods(['GET', 'HEAD'])
    ;

    $routes->add('prova_doctrine', '/prova-doctrine/')
        ->controller([App\Controller\ProvaInterazioneDoctrine::class, 'prova_doctrine'])
        ->methods(['GET', 'HEAD'])
    ;
    
    $routes->add('crea_utenti', '/crea-utenti/')
        ->controller([App\Controller\ProvaInterazioneDoctrine::class, 'crea_utenti'])
        ->methods(['GET', 'HEAD'])
    ;
    
    
    
    
};
