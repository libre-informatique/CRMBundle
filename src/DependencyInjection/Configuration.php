<?php

namespace Librinfo\CRMBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('librinfo_crm');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('code_generator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('supplier')->defaultValue('Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator')->end()
                        ->scalarNode('customer')->defaultValue('Librinfo\CRMBundle\CodeGenerator\CustomerCodeGenerator')->end()
                    ->end()
                ->end()
                ->arrayNode('Circle')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('enabled')->defaultTrue()->end()
                        ->booleanNode('allow_organizations')->defaultTrue()->end()
                        ->booleanNode('allow_individuals')->defaultFalse()->end()
                        ->booleanNode('allow_positions')->defaultFalse()->end()
                        ->arrayNode('app_circles')
                         ->defaultValue([])
                            ->prototype('array')
                                ->children()
                                    ->scalarNode('id')->isRequired()->cannotBeEmpty()->end()
                                    ->scalarNode('name')->isRequired()->cannotBeEmpty()->end()
                                    ->scalarNode('code')->defaultNull()->end()
                                    ->scalarNode('color')->defaultNull()->end()
                                    ->scalarNode('description')->defaultNull()->end()
                                    ->scalarNode('createdAt')->defaultNull()->end()
                                    ->scalarNode('updatedAt')->defaultNull()->end()
                                    ->booleanNode('translatable')->defaultFalse()->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('Organization')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('normalize')
                            ->defaultValue([])
                            ->prototype('array')
                                ->prototype('scalar')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('Individual')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('normalize')
                            ->defaultValue([])
                            ->prototype('array')
                                ->prototype('scalar')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
