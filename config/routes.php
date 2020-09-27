<?PHP

// config/routes.php
use App\Controller\BlogApiController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('prova_twig_paramname', '/prova-twig/{name}')
        ->controller([App\Controller\ProvaTwigController::class, 'prova_twig'])
        ->methods(['GET', 'HEAD'])
    ;

    
    
};
