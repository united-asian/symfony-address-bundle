<?php

namespace UAM\Bundle\AddressBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\LoaderYamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class UAMAddressExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));
        $loader->load('form.yml');
    }
}
