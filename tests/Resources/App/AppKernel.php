<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            # new Symfony\Bundle\MonologBundle\MonologBundle(),
            # new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            //new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            # new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            # Sonata
            /new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            # new Sonata\IntlBundle\SonataIntlBundle(),

            # Blast
            new Blast\CoreBundle\BlastCoreBundle(),
            new Librinfo\CRMBundle\LibrinfoCRMBundle(),
        ];

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    public function getCacheDir()
    {
        return sys_get_temp_dir() . '/Librinfo/CRMBundle/cache/' . $this->getEnvironment();
    }

    public function getLogDir()
    {
        return sys_get_temp_dir() . '/Librinfo/CRMBundle/logs';
    }
}
