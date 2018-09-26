<?php
/**
 * Created by PhpStorm.
 * User: nizar
 * Date: 22/11/2017
 * Time: 11:53
 */

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ModeleRepository extends EntityRepository
{
    public function setTarif($num,$ref)
    {
        $query=$this->getEntityManager()->createQuery('UPDATE EspritUserBundle:Vol v SET v.numvol= :num WHERE v.ref = :ref');
        $query->setParameter('num', $num);
        $query->setParameter('ref', $ref);
        $query->execute();
    }
    public function findlike($ke){
        $ke="%".$ke."%";
        $query=$this->getEntityManager()
            ->createQuery("SELECT u FROM EspritUserBundle:Offrev u WHERE u.numvol LIKE ?1 ");
        $query->setParameters(array(1=>$ke));
        return $query->getResult();
    }
}