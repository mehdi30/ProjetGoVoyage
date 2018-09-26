<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Companyevents
 *
 * @ORM\Table(name="companyevents")
 * @ORM\Entity
 */
class Companyevents
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="bgColor", type="string", length=10, nullable=true)
     */
    private $bgcolor;

    /**
     * @var string
     *
     * @ORM\Column(name="cssClass", type="string", length=10, nullable=true)
     */
    private $cssclass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDatetime", type="datetime", nullable=false)
     */
    private $startdatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDatetime", type="datetime", nullable=false)
     */
    private $enddatetime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allDay", type="boolean", nullable=false)
     */
    private $allday;


}

