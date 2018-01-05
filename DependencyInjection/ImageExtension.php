<?php

namespace Codeneuss\ImageBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ImageExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('image.cropped_image_dir', $config['config']['cropped_image_dir']);
        $container->setParameter('image.thumbs_dir', $config['config']['thumbs_dir']);
        $container->setParameter('image.gallery_dir', $config['config']['gallery_dir']);
        $container->setParameter('image.media_lib_thumb_size', $config['config']['media_lib_thumb_size']);
        $container->setParameter('image.gallery_thumb_size', $config['config']['gallery_thumb_size']);
        $container->setParameter('image.web_dirname', $config['config']['web_dirname']);
        $container->setParameter('image.translation_domain', $config['config']['translation_domain']);
    }
}
