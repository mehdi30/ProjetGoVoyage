<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hebergement
 *
 * @ORM\Table(name="hebergement")
 * @ORM\Entity
 */
class Hebergement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseMail", type="string", length=150, nullable=false)
     */
    private $adressemail;

    /**
     * @var integer
     *
     * @ORM\Column(name="numerotel", type="integer", nullable=false)
     */
    private $numerotel;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbEtoile", type="integer", nullable=false)
     */
    private $nbetoile;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixSingle", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixsingle;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixDouble", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixdouble;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixEnfant", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixenfant;

    /**
     * @var integer
     *
     * @ORM\Column(name="PrixNuit", type="integer", nullable=true)
     */
    private $prixnuit;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=30, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getAdressemail()
    {
        return $this->adressemail;
    }

    /**
     * @param string $adressemail
     */
    public function setAdressemail($adressemail)
    {
        $this->adressemail = $adressemail;
    }

    /**
     * @return int
     */
    public function getNumerotel()
    {
        return $this->numerotel;
    }

    /**
     * @param int $numerotel
     */
    public function setNumerotel($numerotel)
    {
        $this->numerotel = $numerotel;
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
     * @return int
     */
    public function getNbetoile()
    {
        return $this->nbetoile;
    }

    /**
     * @param int $nbetoile
     */
    public function setNbetoile($nbetoile)
    {
        $this->nbetoile = $nbetoile;
    }

    /**
     * @return float
     */
    public function getPrixsingle()
    {
        return $this->prixsingle;
    }

    /**
     * @param float $prixsingle
     */
    public function setPrixsingle($prixsingle)
    {
        $this->prixsingle = $prixsingle;
    }

    /**
     * @return float
     */
    public function getPrixdouble()
    {
        return $this->prixdouble;
    }

    /**
     * @param float $prixdouble
     */
    public function setPrixdouble($prixdouble)
    {
        $this->prixdouble = $prixdouble;
    }

    /**
     * @return float
     */
    public function getPrixenfant()
    {
        return $this->prixenfant;
    }

    /**
     * @param float $prixenfant
     */
    public function setPrixenfant($prixenfant)
    {
        $this->prixenfant = $prixenfant;
    }

    /**
     * @return int
     */
    public function getPrixnuit()
    {
        return $this->prixnuit;
    }

    /**
     * @param int $prixnuit
     */
    public function setPrixnuit($prixnuit)
    {
        $this->prixnuit = $prixnuit;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }


}

