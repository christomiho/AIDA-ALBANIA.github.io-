<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcelaIdentifikimi
 *
 * @ORM\Table(name="parcela_identifikimi", indexes={@ORM\Index(name="fk_pronari_parcela_idx", columns={"pronari"}), @ORM\Index(name="fk_fshati_parcela_idx", columns={"fshati"})})
 * @ORM\Entity
 */
class ParcelaIdentifikimi
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
     * @ORM\Column(name="emri_parceles", type="string", length=100, nullable=true)
     */
    private $emriParceles;

    /**
     * @var integer
     *
     * @ORM\Column(name="kodi", type="integer", nullable=true)
     */
    private $kodi;

    /**
     * @var float
     *
     * @ORM\Column(name="kordinata_x", type="float", precision=10, scale=0, nullable=true)
     */
    private $kordinataX;

    /**
     * @var float
     *
     * @ORM\Column(name="kordinata_y", type="float", precision=10, scale=0, nullable=true)
     */
    private $kordinataY;

    /**
     * @var float
     *
     * @ORM\Column(name="lartesia", type="float", precision=10, scale=0, nullable=true)
     */
    private $lartesia;

    /**
     * @var string
     *
     * @ORM\Column(name="viti_prodhimit", type="string", length=50, nullable=true)
     */
    private $vitiProdhimit;

    /**
     * @var \Pronari
     *
     * @ORM\ManyToOne(targetEntity="Pronari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pronari", referencedColumnName="id")
     * })
     */
    private $pronari;

    /**
     * @var \VendndodhjaFshati
     *
     * @ORM\ManyToOne(targetEntity="VendndodhjaFshati")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fshati", referencedColumnName="id")
     * })
     */
    private $fshati;


    public function __toString(){
        return $this->emriParceles;
    }

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
     * Set emriParceles
     *
     * @param string $emriParceles
     * @return ParcelaIdentifikimi
     */
    public function setEmriParceles($emriParceles)
    {
        $this->emriParceles = $emriParceles;

        return $this;
    }

    /**
     * Get emriParceles
     *
     * @return string 
     */
    public function getEmriParceles()
    {
        return $this->emriParceles;
    }

    /**
     * Set kodi
     *
     * @param integer $kodi
     * @return ParcelaIdentifikimi
     */
    public function setKodi($kodi)
    {
        $this->kodi = $kodi;

        return $this;
    }

    /**
     * Get kodi
     *
     * @return integer 
     */
    public function getKodi()
    {
        return $this->kodi;
    }

    /**
     * Set kordinataX
     *
     * @param float $kordinataX
     * @return ParcelaIdentifikimi
     */
    public function setKordinataX($kordinataX)
    {
        $this->kordinataX = $kordinataX;

        return $this;
    }

    /**
     * Get kordinataX
     *
     * @return float 
     */
    public function getKordinataX()
    {
        return $this->kordinataX;
    }

    /**
     * Set kordinataY
     *
     * @param float $kordinataY
     * @return ParcelaIdentifikimi
     */
    public function setKordinataY($kordinataY)
    {
        $this->kordinataY = $kordinataY;

        return $this;
    }

    /**
     * Get kordinataY
     *
     * @return float 
     */
    public function getKordinataY()
    {
        return $this->kordinataY;
    }

    /**
     * Set lartesia
     *
     * @param float $lartesia
     * @return ParcelaIdentifikimi
     */
    public function setLartesia($lartesia)
    {
        $this->lartesia = $lartesia;

        return $this;
    }

    /**
     * Get lartesia
     *
     * @return float 
     */
    public function getLartesia()
    {
        return $this->lartesia;
    }

    /**
     * Set vitiProdhimit
     *
     * @param string $vitiProdhimit
     * @return ParcelaIdentifikimi
     */
    public function setVitiProdhimit($vitiProdhimit)
    {
        $this->vitiProdhimit = $vitiProdhimit;

        return $this;
    }

    /**
     * Get vitiProdhimit
     *
     * @return string 
     */
    public function getVitiProdhimit()
    {
        return $this->vitiProdhimit;
    }

    /**
     * Set pronari
     *
     * @param \AiadBundle\Entity\Pronari $pronari
     * @return ParcelaIdentifikimi
     */
    public function setPronari(\AiadBundle\Entity\Pronari $pronari = null)
    {
        $this->pronari = $pronari;

        return $this;
    }

    /**
     * Get pronari
     *
     * @return \AiadBundle\Entity\Pronari 
     */
    public function getPronari()
    {
        return $this->pronari;
    }

    /**
     * Set fshati
     *
     * @param \AiadBundle\Entity\VendndodhjaFshati $fshati
     * @return ParcelaIdentifikimi
     */
    public function setFshati(\AiadBundle\Entity\VendndodhjaFshati $fshati = null)
    {
        $this->fshati = $fshati;

        return $this;
    }

    /**
     * Get fshati
     *
     * @return \AiadBundle\Entity\VendndodhjaFshati 
     */
    public function getFshati()
    {
        return $this->fshati;
    }
}
