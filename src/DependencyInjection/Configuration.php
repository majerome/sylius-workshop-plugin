<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Resource\Factory\Factory;
use Sylius\Resource\Factory\TranslatableFactory;
use Majerome\WorkshopPlugin\Entity\Brand\Brand;
use Majerome\WorkshopPlugin\Entity\Brand\BrandInterface;
use Majerome\WorkshopPlugin\Entity\Brand\BrandTranslation;
use Majerome\WorkshopPlugin\Entity\Brand\BrandTranslationInterface;
use Majerome\WorkshopPlugin\Form\Type\BrandTranslationType;
use Majerome\WorkshopPlugin\Form\Type\BrandType;
use Majerome\WorkshopPlugin\Repository\BrandRepository;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('majerome_workshop');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }

    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
            ->arrayNode('resources')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('brand')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('model')->defaultValue(Brand::class)->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(BrandInterface::class)->cannotBeEmpty()->end()
            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
            ->scalarNode('repository')->defaultValue(BrandRepository::class)->cannotBeEmpty()->end()
            ->scalarNode('factory')->defaultValue(TranslatableFactory::class)->end()
            ->scalarNode('form')->defaultValue(BrandType::class)->cannotBeEmpty()->end()
            ->end()
            ->end()
            ->arrayNode('translation')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('model')->defaultValue(BrandTranslation::class)->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(BrandTranslationInterface::class)->cannotBeEmpty()->end()
            ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
            ->scalarNode('repository')->cannotBeEmpty()->end()
            ->scalarNode('factory')->defaultValue(Factory::class)->end()
            ->scalarNode('form')->defaultValue(BrandTranslationType::class)->cannotBeEmpty()->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end()
        ;
    }
}
