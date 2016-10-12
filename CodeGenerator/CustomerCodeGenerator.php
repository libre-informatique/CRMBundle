<?php

namespace Librinfo\CRMBundle\CodeGenerator;

use Doctrine\ORM\EntityManager;
use Librinfo\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Librinfo\CRMBundle\Entity\Organism;

class CustomerCodeGenerator implements CodeGeneratorInterface
{
    const ENTITY_CLASS = 'Librinfo\CRMBundle\Entity\Organism';
    const ENTITY_FIELD = 'customerCode';

    /**
     * @var EntityManager
     */
    private static $em;

    // TODO: this should be in app configuration:
    public static $codePrefix = '';
    public static $codeLength= 6;


    public static function setEntityManager(EntityManager $em)
    {
        self::$em = $em;
    }

    /**
     * @param  Organism $organism
     * @return string
     */
    public static function generate($organism)
    {
        $repo = self::$em->getRepository(Organism::class);
        $regexp = sprintf('^%s(\d{%d})$', self::$codePrefix, self::$codeLength);
        $res = $repo->createQueryBuilder('c')
            ->select("SUBSTRING(c.customerCode, '$regexp') AS code")
            ->andWhere("SUBSTRING(c.customerCode, '$regexp') != ''")
            ->setMaxResults(1)
            ->addOrderBy('code', 'desc')
            ->getQuery()
            ->getScalarResult()
        ;
        $max = $res ? (int)$res[0]['code'] : 0;

        return sprintf("%s%0".self::$codeLength."d", self::$codePrefix, $max + 1);
    }

    /**
     * @param string    $code
     * @param Organism  $organism
     * @return          boolean
     */
    public static function validate($code, $organism = null)
    {
        $regexp = sprintf('/^%s(\d{%d})$/', self::$codePrefix, self::$codeLength);
        return preg_match($regexp, $code);
    }

    /**
     * @return string
     */
    public static function getHelp()
    {
        return self::$codePrefix ? sprintf('%s + %d digits', self::$codePrefix, self::$codeLength)
            : sprintf('%d digits', self::$codeLength);
    }

}