<?php

namespace ContainerQGxdJTq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getForm_ServerParamsService extends RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer
{
    /**
     * Gets the private 'form.server_params' shared service.
     *
     * @return \Symfony\Component\Form\Util\ServerParams
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 6).'/vendor/symfony/form/Util/ServerParams.php';

        return $container->privates['form.server_params'] = new \Symfony\Component\Form\Util\ServerParams(($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
