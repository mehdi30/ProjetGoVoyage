<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Chaabene
 * Date: 18/11/2017
 * Time: 16:46
 */

namespace Esprit\UserBundle\Entity;


use Doctrine\ORM\EntityRepository;

class VolRepository extends EntityRepository
{
      public function findPastFlights(){
          $query = $this->getEntityManager()->createQuery("SELECT v from EspritUserBundle:Vol v WHERE v.nbrplaceeco=0 AND v.nbrplaceaffaire=0 OR v.datedepartaller <= CURRENT_DATE()");

          return $query->getResult();
      }

    public function findcurrentFlights(){
        $query = $this->getEntityManager()->createQuery("SELECT v from EspritUserBundle:Vol v WHERE v.nbrplaceeco>0 OR v.nbrplaceaffaire>0 AND v.datedepartaller > CURRENT_DATE()");

        return $query->getResult();
    }

      public function updatePast($ref){
          $query = $this->getEntityManager()->createQuery('UPDATE EspritUserBundle:Vol v SET v.nbrplaceeco = :nvNbrplaceeco WHERE v.ref = :ref');
          $query->SetParameter('nvNbrplaceeco',0);
          $query->SetParameter('ref','$ref');
          return $query->execute();


      }
    public function findlike($ke){
        $ke="%".$ke."%";
        $query=$this->getEntityManager()
            ->createQuery("SELECT u FROM EspritUserBundle:Vol u WHERE u.numvol LIKE ?1 OR u.villedepart LIKE ?2 OR u.villearrivee LIKE ?3 ");
        $query->setParameters(array(1=>$ke,2=>$ke,3=>$ke));
        return $query->getResult();
    }

}