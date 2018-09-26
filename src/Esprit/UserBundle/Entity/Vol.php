<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol")
 * @ORM\Entity(repositoryClass="Esprit\UserBundle\Entity\VolRepository")
 */
class Vol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="villeDepart", type="string", length=30, nullable=true)
     */
    private $villedepart;

    /**
     * @var string
     *
     * @ORM\Column(name="villeArrivee", type="string", length=30, nullable=true)
     */
    private $villearrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepartAller", type="date", nullable=true)
     */
    private $datedepartaller;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArriveeAller", type="date", nullable=true)
     */
    private $datearriveealler;

    /**
     * @var string
     *
     * @ORM\Column(name="heureDepart", type="string", length=30, nullable=false)
     */
    private $heuredepart;

    /**
     * @var string
     *
     * @ORM\Column(name="numVol", type="string", length=30, nullable=false)
     */
    private $numvol;

    /**
     * @var string
     *
     * @ORM\Column(name="typeAvion", type="string", length=30, nullable=true)
     */
    private $typeavion;

    /**
     * @var string
     *
     * @ORM\Column(name="cie_aerienne", type="string", length=30, nullable=true)
     */
    private $cieAerienne;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=30, nullable=false)
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPlaceEco", type="integer", nullable=false)
     */
    private $nbrplaceeco;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPlaceAffaire", type="integer", nullable=false)
     */
    private $nbrplaceaffaire;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", precision=10, scale=0, nullable=true)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="typeVol", type="string", length=30, nullable=false)
     */
    private $typevol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepartRetour", type="date", nullable=true)
     */
    private $datedepartretour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArriveeRetour", type="date", nullable=true)
     */
    private $datearriveeretour;

    /**
     * @var string
     *
     * @ORM\Column(name="heureDepartR", type="string", length=30, nullable=true)
     */
    private $heuredepartr;

    /**
     * @return int
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param int $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getVilledepart()
    {
        return $this->villedepart;
    }

    /**
     * @param string $villedepart
     */
    public function setVilledepart($villedepart)
    {
        $this->villedepart = $villedepart;
    }

    /**
     * @return string
     */
    public function getVillearrivee()
    {
        return $this->villearrivee;
    }

    /**
     * @param string $villearrivee
     */
    public function setVillearrivee($villearrivee)
    {
        $this->villearrivee = $villearrivee;
    }

    /**
     * @return \DateTime
     */
    public function getDatedepartaller()
    {
        return $this->datedepartaller;
    }

    /**
     * @param \DateTime $datedepartaller
     */
    public function setDatedepartaller($datedepartaller)
    {
        $this->datedepartaller = $datedepartaller;
    }

    /**
     * @return \DateTime
     */
    public function getDatearriveealler()
    {
        return $this->datearriveealler;
    }

    /**
     * @param \DateTime $datearriveealler
     */
    public function setDatearriveealler($datearriveealler)
    {
        $this->datearriveealler = $datearriveealler;
    }

    /**
     * @return string
     */
    public function getHeuredepart()
    {
        return $this->heuredepart;
    }

    /**
     * @param string $heuredepart
     */
    public function setHeuredepart($heuredepart)
    {
        $this->heuredepart = $heuredepart;
    }

    /**
     * @return string
     */
    public function getNumvol()
    {
        return $this->numvol;
    }

    /**
     * @param string $numvol
     */
    public function setNumvol($numvol)
    {
        $this->numvol = $numvol;
    }

    /**
     * @return string
     */
    public function getTypeavion()
    {
        return $this->typeavion;
    }

    /**
     * @param string $typeavion
     */
    public function setTypeavion($typeavion)
    {
        $this->typeavion = $typeavion;
    }

    /**
     * @return string
     */
    public function getCieAerienne()
    {
        return $this->cieAerienne;
    }

    /**
     * @param string $cieAerienne
     */
    public function setCieAerienne($cieAerienne)
    {
        $this->cieAerienne = $cieAerienne;
    }

    /**
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param string $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return int
     */
    public function getNbrplaceeco()
    {
        return $this->nbrplaceeco;
    }

    /**
     * @param int $nbrplaceeco
     */
    public function setNbrplaceeco($nbrplaceeco)
    {
        $this->nbrplaceeco = $nbrplaceeco;
    }

    /**
     * @return int
     */
    public function getNbrplaceaffaire()
    {
        return $this->nbrplaceaffaire;
    }

    /**
     * @param int $nbrplaceaffaire
     */
    public function setNbrplaceaffaire($nbrplaceaffaire)
    {
        $this->nbrplaceaffaire = $nbrplaceaffaire;
    }

    /**
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param float $tarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    /**
     * @return string
     */
    public function getTypevol()
    {
        return $this->typevol;
    }

    /**
     * @param string $typevol
     */
    public function setTypevol($typevol)
    {
        $this->typevol = $typevol;
    }

    /**
     * @return \DateTime
     */
    public function getDatedepartretour()
    {
        return $this->datedepartretour;
    }

    /**
     * @param \DateTime $datedepartretour
     */
    public function setDatedepartretour($datedepartretour)
    {
        $this->datedepartretour = $datedepartretour;
    }

    /**
     * @return \DateTime
     */
    public function getDatearriveeretour()
    {
        return $this->datearriveeretour;
    }

    /**
     * @param \DateTime $datearriveeretour
     */
    public function setDatearriveeretour($datearriveeretour)
    {
        $this->datearriveeretour = $datearriveeretour;
    }

    /**
     * @return string
     */
    public function getHeuredepartr()
    {
        return $this->heuredepartr;
    }

    /**
     * @param string $heuredepartr
     */
    public function setHeuredepartr($heuredepartr)
    {
        $this->heuredepartr = $heuredepartr;
    }


}

