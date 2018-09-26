<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="ref_client_fk", columns={"ref_client_fk"}), @ORM\Index(name="ref_hebergement_fk", columns={"ref_hebergement_fk"}), @ORM\Index(name="ref_vol_fk", columns={"ref_vol_fk"})})
 * @ORM\Entity
 */
class Reservation
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
     * @ORM\Column(name="type", type="string", length=40, nullable=true)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrivee_h", type="date", nullable=true)
     */
    private $dateArriveeH;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie_h", type="date", nullable=true)
     */
    private $dateSortieH;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_Adultes", type="integer", nullable=true)
     */
    private $nbreAdultes;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_Enfants", type="integer", nullable=true)
     */
    private $nbreEnfants;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_nuits", type="integer", nullable=true)
     */
    private $nbreNuits;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_chbre_single", type="integer", nullable=true)
     */
    private $nbreChbreSingle;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_chbre_double", type="integer", nullable=true)
     */
    private $nbreChbreDouble;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_total", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixTotal;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_client_fk", referencedColumnName="ref")
     * })
     */
    private $refClientFk;

    /**
     * @var \Hebergement
     *
     * @ORM\ManyToOne(targetEntity="Hebergement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_hebergement_fk", referencedColumnName="id")
     * })
     */
    private $refHebergementFk;

    /**
     * @var \Vol
     *
     * @ORM\ManyToOne(targetEntity="Vol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_vol_fk", referencedColumnName="ref")
     * })
     */
    private $refVolFk;

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
    public function getTypee()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return \DateTime
     */
    public function getDateArriveeH()
    {
        return $this->dateArriveeH;
    }

    /**
     * @param \DateTime $dateArriveeH
     */
    public function setDateArriveeH($dateArriveeH)
    {
        $this->dateArriveeH = $dateArriveeH;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortieH()
    {
        return $this->dateSortieH;
    }

    /**
     * @param \DateTime $dateSortieH
     */
    public function setDateSortieH($dateSortieH)
    {
        $this->dateSortieH = $dateSortieH;
    }

    /**
     * @return int
     */
    public function getNbreAdultes()
    {
        return $this->nbreAdultes;
    }

    /**
     * @param int $nbreAdultes
     */
    public function setNbreAdultes($nbreAdultes)
    {
        $this->nbreAdultes = $nbreAdultes;
    }

    /**
     * @return int
     */
    public function getNbreEnfants()
    {
        return $this->nbreEnfants;
    }

    /**
     * @param int $nbreEnfants
     */
    public function setNbreEnfants($nbreEnfants)
    {
        $this->nbreEnfants = $nbreEnfants;
    }

    /**
     * @return int
     */
    public function getNbreNuits()
    {
        return $this->nbreNuits;
    }

    /**
     * @param int $nbreNuits
     */
    public function setNbreNuits($nbreNuits)
    {
        $this->nbreNuits = $nbreNuits;
    }

    /**
     * @return int
     */
    public function getNbreChbreSingle()
    {
        return $this->nbreChbreSingle;
    }

    /**
     * @param int $nbreChbreSingle
     */
    public function setNbreChbreSingle($nbreChbreSingle)
    {
        $this->nbreChbreSingle = $nbreChbreSingle;
    }

    /**
     * @return int
     */
    public function getNbreChbreDouble()
    {
        return $this->nbreChbreDouble;
    }

    /**
     * @param int $nbreChbreDouble
     */
    public function setNbreChbreDouble($nbreChbreDouble)
    {
        $this->nbreChbreDouble = $nbreChbreDouble;
    }

    /**
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * @param float $prixTotal
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;
    }

    /**
     * @return \Utilisateur
     */
    public function getRefClientFk()
    {
        return $this->refClientFk;
    }

    /**
     * @param \Utilisateur $refClientFk
     */
    public function setRefClientFk($refClientFk)
    {
        $this->refClientFk = $refClientFk;
    }

    /**
     * @return \Hebergement
     */
    public function getRefHebergementFk()
    {
        return $this->refHebergementFk;
    }

    /**
     * @param \Hebergement $refHebergementFk
     */
    public function setRefHebergementFk($refHebergementFk)
    {
        $this->refHebergementFk = $refHebergementFk;
    }

    /**
     * @return \Vol
     */
    public function getRefVolFk()
    {
        return $this->refVolFk;
    }

    /**
     * @param \Vol $refVolFk
     */
    public function setRefVolFk($refVolFk)
    {
        $this->refVolFk = $refVolFk;
    }



}

