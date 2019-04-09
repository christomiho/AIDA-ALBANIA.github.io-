<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcelaKultivari
 *
 * @ORM\Table(name="parcela_kultivari", indexes={@ORM\Index(name="fk_parcela_kultivari_idx", columns={"parcela"}), @ORM\Index(name="fk_distanca_kultivari_idx", columns={"distanca"}), @ORM\Index(name="fk_kembe_peme_kultivari_idx", columns={"nr_kembe_peme"}), @ORM\Index(name="fk_forma_kurores_kultivari_idx", columns={"forma_kurores"}), @ORM\Index(name="fk_varieteti_kryesor_idx", columns={"varieteti_paresor"}), @ORM\Index(name="fk_varieteti_dytesor_idx", columns={"varieteti_dytesor"})})
 * @ORM\Entity
 */
class ParcelaKultivari
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
     * @ORM\Column(name="data_mbjellje_var1", type="date", nullable=true)
     */
    private $dataMbjelljeVar1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_mbjellje_var2", type="date", nullable=true)
     */
    private $dataMbjelljeVar2;

    /**
     * @var float
     *
     * @ORM\Column(name="siperfaqe_var2", type="float", precision=10, scale=0, nullable=true)
     */
    private $siperfaqeVar2;

    /**
     * @var float
     *
     * @ORM\Column(name="dendesia", type="float", precision=10, scale=0, nullable=true)
     */
    private $dendesia;

    /**
     * @var float
     *
     * @ORM\Column(name="diametri_kurores", type="float", precision=10, scale=0, nullable=true)
     */
    private $diametriKurores;

    /**
     * @var float
     *
     * @ORM\Column(name="lartesia_kurores", type="float", precision=10, scale=0, nullable=true)
     */
    private $lartesiaKurores;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime_tjera", type="text", nullable=true)
     */
    private $vezhgimeTjera;

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
     * @var \SettingsDistanca
     *
     * @ORM\ManyToOne(targetEntity="SettingsDistanca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="distanca", referencedColumnName="id")
     * })
     */
    private $distanca;

    /**
     * @var \SettingsKembePeme
     *
     * @ORM\ManyToOne(targetEntity="SettingsKembePeme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nr_kembe_peme", referencedColumnName="id")
     * })
     */
    private $nrKembePeme;

    /**
     * @var \SettingsFormaKurores
     *
     * @ORM\ManyToOne(targetEntity="SettingsFormaKurores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forma_kurores", referencedColumnName="id")
     * })
     */
    private $formaKurores;

    /**
     * @var \Kultivaret
     *
     * @ORM\ManyToOne(targetEntity="Kultivaret")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="varieteti_paresor", referencedColumnName="id")
     * })
     */
    private $varietetiParesor;

    /**
     * @var \Kultivaret
     *
     * @ORM\ManyToOne(targetEntity="Kultivaret")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="varieteti_dytesor", referencedColumnName="id")
     * })
     */
    private $varietetiDytesor;



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
     * Set dataMbjelljeVar1
     *
     * @param \DateTime $dataMbjelljeVar1
     * @return ParcelaKultivari
     */
    public function setDataMbjelljeVar1($dataMbjelljeVar1)
    {
        $this->dataMbjelljeVar1 = $dataMbjelljeVar1;

        return $this;
    }

    /**
     * Get dataMbjelljeVar1
     *
     * @return \DateTime 
     */
    public function getDataMbjelljeVar1()
    {
        return $this->dataMbjelljeVar1;
    }

    /**
     * Set dataMbjelljeVar2
     *
     * @param \DateTime $dataMbjelljeVar2
     * @return ParcelaKultivari
     */
    public function setDataMbjelljeVar2($dataMbjelljeVar2)
    {
        $this->dataMbjelljeVar2 = $dataMbjelljeVar2;

        return $this;
    }

    /**
     * Get dataMbjelljeVar2
     *
     * @return \DateTime 
     */
    public function getDataMbjelljeVar2()
    {
        return $this->dataMbjelljeVar2;
    }

    /**
     * Set siperfaqeVar2
     *
     * @param float $siperfaqeVar2
     * @return ParcelaKultivari
     */
    public function setSiperfaqeVar2($siperfaqeVar2)
    {
        $this->siperfaqeVar2 = $siperfaqeVar2;

        return $this;
    }

    /**
     * Get siperfaqeVar2
     *
     * @return float 
     */
    public function getSiperfaqeVar2()
    {
        return $this->siperfaqeVar2;
    }

    /**
     * Set dendesia
     *
     * @param float $dendesia
     * @return ParcelaKultivari
     */
    public function setDendesia($dendesia)
    {
        $this->dendesia = $dendesia;

        return $this;
    }

    /**
     * Get dendesia
     *
     * @return float 
     */
    public function getDendesia()
    {
        return $this->dendesia;
    }

    /**
     * Set diametriKurores
     *
     * @param float $diametriKurores
     * @return ParcelaKultivari
     */
    public function setDiametriKurores($diametriKurores)
    {
        $this->diametriKurores = $diametriKurores;

        return $this;
    }

    /**
     * Get diametriKurores
     *
     * @return float 
     */
    public function getDiametriKurores()
    {
        return $this->diametriKurores;
    }

    /**
     * Set lartesiaKurores
     *
     * @param float $lartesiaKurores
     * @return ParcelaKultivari
     */
    public function setLartesiaKurores($lartesiaKurores)
    {
        $this->lartesiaKurores = $lartesiaKurores;

        return $this;
    }

    /**
     * Get lartesiaKurores
     *
     * @return float 
     */
    public function getLartesiaKurores()
    {
        return $this->lartesiaKurores;
    }

    /**
     * Set vezhgimeTjera
     *
     * @param string $vezhgimeTjera
     * @return ParcelaKultivari
     */
    public function setVezhgimeTjera($vezhgimeTjera)
    {
        $this->vezhgimeTjera = $vezhgimeTjera;

        return $this;
    }

    /**
     * Get vezhgimeTjera
     *
     * @return string 
     */
    public function getVezhgimeTjera()
    {
        return $this->vezhgimeTjera;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return ParcelaKultivari
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

    /**
     * Set distanca
     *
     * @param \AiadBundle\Entity\SettingsDistanca $distanca
     * @return ParcelaKultivari
     */
    public function setDistanca(\AiadBundle\Entity\SettingsDistanca $distanca = null)
    {
        $this->distanca = $distanca;

        return $this;
    }

    /**
     * Get distanca
     *
     * @return \AiadBundle\Entity\SettingsDistanca 
     */
    public function getDistanca()
    {
        return $this->distanca;
    }

    /**
     * Set nrKembePeme
     *
     * @param \AiadBundle\Entity\SettingsKembePeme $nrKembePeme
     * @return ParcelaKultivari
     */
    public function setNrKembePeme(\AiadBundle\Entity\SettingsKembePeme $nrKembePeme = null)
    {
        $this->nrKembePeme = $nrKembePeme;

        return $this;
    }

    /**
     * Get nrKembePeme
     *
     * @return \AiadBundle\Entity\SettingsKembePeme 
     */
    public function getNrKembePeme()
    {
        return $this->nrKembePeme;
    }

    /**
     * Set formaKurores
     *
     * @param \AiadBundle\Entity\SettingsFormaKurores $formaKurores
     * @return ParcelaKultivari
     */
    public function setFormaKurores(\AiadBundle\Entity\SettingsFormaKurores $formaKurores = null)
    {
        $this->formaKurores = $formaKurores;

        return $this;
    }

    /**
     * Get formaKurores
     *
     * @return \AiadBundle\Entity\SettingsFormaKurores 
     */
    public function getFormaKurores()
    {
        return $this->formaKurores;
    }

    /**
     * Set varietetiParesor
     *
     * @param \AiadBundle\Entity\Kultivaret $varietetiParesor
     * @return ParcelaKultivari
     */
    public function setVarietetiParesor(\AiadBundle\Entity\Kultivaret $varietetiParesor = null)
    {
        $this->varietetiParesor = $varietetiParesor;

        return $this;
    }

    /**
     * Get varietetiParesor
     *
     * @return \AiadBundle\Entity\Kultivaret 
     */
    public function getVarietetiParesor()
    {
        return $this->varietetiParesor;
    }

    /**
     * Set varietetiDytesor
     *
     * @param \AiadBundle\Entity\Kultivaret $varietetiDytesor
     * @return ParcelaKultivari
     */
    public function setVarietetiDytesor(\AiadBundle\Entity\Kultivaret $varietetiDytesor = null)
    {
        $this->varietetiDytesor = $varietetiDytesor;

        return $this;
    }

    /**
     * Get varietetiDytesor
     *
     * @return \AiadBundle\Entity\Kultivaret 
     */
    public function getVarietetiDytesor()
    {
        return $this->varietetiDytesor;
    }
}
