<?php

namespace AiadBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AiadBundle extends Bundle
{
    private static $containerInstance = null;
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        self::$containerInstance = $container;
    }

    public static function getContainer()
    {
        return self::$containerInstance;
    }
}
