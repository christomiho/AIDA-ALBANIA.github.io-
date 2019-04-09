<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraKalimiPragut
 *
 * @ORM\Table(name="mostra_kalimi_pragut", indexes={@ORM\Index(name="fk_parcela_kalimi_pragut_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraKalimiPragut
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_kalimipragut", type="date", nullable=true)
     */
    private $dataKalimipragut;

    /**
     * @var integer
     *
     * @ORM\Column(name="kocinija", type="integer", nullable=true)
     */
    private $kocinija;

    /**
     * @var integer
     *
     * @ORM\Column(name="prais_filofage", type="integer", nullable=true)
     */
    private $praisFilofage;

    /**
     * @var integer
     *
     * @ORM\Column(name="prais_antofage", type="integer", nullable=true)
     */
    private $praisAntofage;

    /**
     * @var integer
     *
     * @ORM\Column(name="prais_karpofage", type="integer", nullable=true)
     */
    private $praisKarpofage;

    /**
     * @var integer
     *
     * @ORM\Column(name="prais_stadi_larvor", type="integer", nullable=true)
     */
    private $praisStadiLarvor;

    /**
     * @var integer
     *
     * @ORM\Column(name="miza", type="integer", nullable=true)
     */
    private $miza;

    /**
     * @var integer
     *
     * @ORM\Column(name="barrenijo", type="integer", nullable=true)
     */
    private $barrenijo;

    /**
     * @var integer
     *
     * @ORM\Column(name="syri_palloit", type="integer", nullable=true)
     */
    private $syriPalloit;

    /**
     * @var integer
     *
     * @ORM\Column(name="verticilium", type="integer", nullable=true)
     */
    private $verticilium;

    /**
     * @var \ParcelaIdentifikimi
     *
     * @ORM\ManyToOne(targetEntity="ParcelaIdentifikimi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parcela", referencedColumnName="id")
     * })
     */
    private $parcela;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataKalimipragut
     *
     * @param \DateTime $dataKalimipragut
     * @return MostraKalimiPragut
     */
    public function setDataKalimipragut($dataKalimipragut)
    {
        $this->dataKalimipragut = $dataKalimipragut;

        return $this;
    }

    /**
     * Get dataKalimipragut
     *
     * @return \DateTime 
     */
    public function getDataKalimipragut()
    {
        return $this->dataKalimipragut;
    }

    /**
     * Set kocinija
     *
     * @param integer $kocinija
     * @return MostraKalimiPragut
     */
    public function setKocinija($kocinija)
    {
        $this->kocinija = $kocinija;

        return $this;
    }

    /**
     * Get kocinija
     *
     * @return integer 
     */
    public function getKocinija()
    {
        return $this->kocinija;
    }

    /**
     * Set praisFilofage
     *
     * @param integer $praisFilofage
     * @return MostraKalimiPragut
     */
    public function setPraisFilofage($praisFilofage)
    {
        $this->praisFilofage = $praisFilofage;

        return $this;
    }

    /**
     * Get praisFilofage
     *
     * @return integer 
     */
    public function getPraisFilofage()
    {
        return $this->praisFilofage;
    }

    /**
     * Set praisAntofage
     *
     * @param integer $praisAntofage
     * @return MostraKalimiPragut
     */
    public function setPraisAntofage($praisAntofage)
    {
        $this->praisAntofage = $praisAntofage;

        return $this;
    }

    /**
     * Get praisAntofage
     *
     * @return integer 
     */
    public function getPraisAntofage()
    {
        return $this->praisAntofage;
    }

    /**
     * Set praisKarpofage
     *
     * @param integer $praisKarpofage
     * @return MostraKalimiPragut
     */
    public function setPraisKarpofage($praisKarpofage)
    {
        $this->praisKarpofage = $praisKarpofage;

        return $this;
    }

    /**
     * Get praisKarpofage
     *
     * @return integer 
     */
    public function getPraisKarpofage()
    {
        return $this->praisKarpofage;
    }

    /**
     * Set praisStadiLarvor
     *
     * @param integer $praisStadiLarvor
     * @return MostraKalimiPragut
     */
    public function setPraisStadiLarvor($praisStadiLarvor)
    {
        $this->praisStadiLarvor = $praisStadiLarvor;

        return $this;
    }

    /**
     * Get praisStadiLarvor
     *
     * @return integer 
     */
    public function getPraisStadiLarvor()
    {
        return $this->praisStadiLarvor;
    }

    /**
     * Set miza
     *
     * @param integer $miza
     * @return MostraKalimiPragut
     */
    public function setMiza($miza)
    {
        $this->miza = $miza;

        return $this;
    }

    /**
     * Get miza
     *
     * @return integer 
     */
    public function getMiza()
    {
        return $this->miza;
    }

    /**
     * Set barrenijo
     *
     * @param integer $barrenijo
     * @return MostraKalimiPragut
     */
    public function setBarrenijo($barrenijo)
    {
        $this->barrenijo = $barrenijo;

        return $this;
    }

    /**
     * Get barrenijo
     *
     * @return integer 
     */
    public function getBarrenijo()
    {
        return $this->barrenijo;
    }

    /**
     * Set syriPalloit
     *
     * @param integer $syriPalloit
     * @return MostraKalimiPragut
     */
    public function setSyriPalloit($syriPalloit)
    {
        $this->syriPalloit = $syriPalloit;

        return $this;
    }

    /**
     * Get syriPalloit
     *
     * @return integer 
     */
    public function getSyriPalloit()
    {
        return $this->syriPalloit;
    }

    /**
     * Set verticilium
     *
     * @param integer $verticilium
     * @return MostraKalimiPragut
     */
    public function setVerticilium($verticilium)
    {
        $this->verticilium = $verticilium;

        return $this;
    }

    /**
     * Get verticilium
     *
     * @return integer 
     */
    public function getVerticilium()
    {
        return $this->verticilium;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraKalimiPragut
     */
    public function setParcela(\AiadBundle\Entity\ParcelaIdentifikimi $parcela = null)
    {
        $this->parcela = $parcela;

        return $this;
    }

    /**
     * Get parcela
     *
     * @return \AiadBundle\Entity\ParcelaIdentifikimi 
     */
    public function getParcela()
    {
        return $this->parcela;
    }
}
