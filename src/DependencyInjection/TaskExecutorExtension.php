<?php

namespace Vados\TaskExecutorBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Vados\TaskExecutorBundle\Exception\Handler\HandlerInterface;

class TaskExecutorExtension extends Extension
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container
            ->registerForAutoconfiguration(HandlerInterface::class)
            ->addTag('vados.task.exception.handler');
    }
}
