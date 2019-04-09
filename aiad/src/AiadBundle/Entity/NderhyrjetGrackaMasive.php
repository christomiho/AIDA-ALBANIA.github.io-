<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetGrackaMasive
 *
 * @ORM\Table(name="nderhyrjet_gracka_masive", indexes={@ORM\Index(name="fk_gracka_parcela_idx", columns={"parcela"}), @ORM\Index(name="fk_gracka_tipi_idx", columns={"tipi"}), @ORM\Index(name="fk_gracka_objektivi_idx", columns={"objektivi_semundjes"}), @ORM\Index(name="fk_gracka_difuzori_idx", columns={"tipi_grackes_difuzorit"}), @ORM\Index(name="fk_ferromoni_idx", columns={"ferromoni"}), @ORM\Index(name="fk_komp_prodhuese_idx", columns={"ferromoni_kompania_prodhuese"}), @ORM\Index(name="fk_komp_shperndarese_idx", columns={"ferromoni_kompania_shperndarese"})})
 * @ORM\Entity
 */
class NderhyrjetGrackaMasive
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
     * @ORM\Column(name="data_nderhyrjes", type="date", nullable=true)
     */
    private $dataNderhyrjes;

    /**
     * @var integer
     *
     * @ORM\Column(name="numri_grackave", type="integer", nullable=true)
     */
    private $numriGrackave;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=200, nullable=true)
     */
    private $vezhgime;

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
     * @var \SettingsGrackaTipi
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaTipi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi", referencedColumnName="id")
     * })
     */
    private $tipi;

    /**
     * @var \SettingsGrackaObjektivi
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaObjektivi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="objektivi_semundjes", referencedColumnName="id")
     * })
     */
    private $objektiviSemundjes;

    /**
     * @var \SettingsGrackaTipiDifuzorit
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaTipiDifuzorit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi_grackes_difuzorit", referencedColumnName="id")
     * })
     */
    private $tipiGrackesDifuzorit;

    /**
     * @var \SettingsGrackaFerromoni
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaFerromoni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ferromoni", referencedColumnName="id")
     * })
     */
    private $ferromoni;

    /**
     * @var \SettingsGrackaKompProdhuse
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaKompProdhuse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ferromoni_kompania_prodhuese", referencedColumnName="id")
     * })
     */
    private $ferromoniKompaniaProdhuese;

    /**
     * @var \SettingsGrackaKompShperndarese
     *
     * @ORM\ManyToOne(targetEntity="SettingsGrackaKompShperndarese")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ferromoni_kompania_shperndarese", referencedColumnName="id")
     * })
     */
    private $ferromoniKompaniaShperndarese;



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
     * Set dataNderhyrjes
     *
     * @param \DateTime $dataNderhyrjes
     * @return NderhyrjetGrackaMasive
     */
    public function setDataNderhyrjes($dataNderhyrjes)
    {
        $this->dataNderhyrjes = $dataNderhyrjes;

        return $this;
    }

    /**
     * Get dataNderhyrjes
     *
     * @return \DateTime 
     */
    public function getDataNderhyrjes()
    {
        return $this->dataNderhyrjes;
    }

    /**
     * Set numriGrackave
     *
     * @param integer $numriGrackave
     * @return NderhyrjetGrackaMasive
     */
    public function setNumriGrackave($numriGrackave)
    {
        $this->numriGrackave = $numriGrackave;

        return $this;
    }

    /**
     * Get numriGrackave
     *
     * @return integer 
     */
    public function getNumriGrackave()
    {
        return $this->numriGrackave;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetGrackaMasive
     */
    public function setVezhgime($vezhgime)
    {
        $this->vezhgime = $vezhgime;

        return $this;
    }

    /**
     * Get vezhgime
     *
     * @return string 
     */
    public function getVezhgime()
    {
        return $this->vezhgime;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetGrackaMasive
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
     * Set tipi
     *
     * @param \AiadBundle\Entity\SettingsGrackaTipi $tipi
     * @return NderhyrjetGrackaMasive
     */
    public function setTipi(\AiadBundle\Entity\SettingsGrackaTipi $tipi = null)
    {
        $this->tipi = $tipi;

        return $this;
    }

    /**
     * Get tipi
     *
     * @return \AiadBundle\Entity\SettingsGrackaTipi 
     */
    public function getTipi()
    {
        return $this->tipi;
    }

    /**
     * Set objektiviSemundjes
     *
     * @param \AiadBundle\Entity\SettingsGrackaObjektivi $objektiviSemundjes
     * @return NderhyrjetGrackaMasive
     */
    public function setObjektiviSemundjes(\AiadBundle\Entity\SettingsGrackaObjektivi $objektiviSemundjes = null)
    {
        $this->objektiviSemundjes = $objektiviSemundjes;

        return $this;
    }

    /**
     * Get objektiviSemundjes
     *
     * @return \AiadBundle\Entity\SettingsGrackaObjektivi 
     */
    public function getObjektiviSemundjes()
    {
        return $this->objektiviSemundjes;
    }

    /**
     * Set tipiGrackesDifuzorit
     *
     * @param \AiadBundle\Entity\SettingsGrackaTipiDifuzorit $tipiGrackesDifuzorit
     * @return NderhyrjetGrackaMasive
     */
    public function setTipiGrackesDifuzorit(\AiadBundle\Entity\SettingsGrackaTipiDifuzorit $tipiGrackesDifuzorit = null)
    {
        $this->tipiGrackesDifuzorit = $tipiGrackesDifuzorit;

        return $this;
    }

    /**
     * Get tipiGrackesDifuzorit
     *
     * @return \AiadBundle\Entity\SettingsGrackaTipiDifuzorit 
     */
    public function getTipiGrackesDifuzorit()
    {
        return $this->tipiGrackesDifuzorit;
    }

    /**
     * Set ferromoni
     *
     * @param \AiadBundle\Entity\SettingsGrackaFerromoni $ferromoni
     * @return NderhyrjetGrackaMasive
     */
    public function setFerromoni(\AiadBundle\Entity\SettingsGrackaFerromoni $ferromoni = null)
    {
        $this->ferromoni = $ferromoni;

        return $this;
    }

    /**
     * Get ferromoni
     *
     * @return \AiadBundle\Entity\SettingsGrackaFerromoni 
     */
    public function getFerromoni()
    {
        return $this->ferromoni;
    }

    /**
     * Set ferromoniKompaniaProdhuese
     *
     * @param \AiadBundle\Entity\SettingsGrackaKompProdhuse $ferromoniKompaniaProdhuese
     * @return NderhyrjetGrackaMasive
     */
    public function setFerromoniKompaniaProdhuese(\AiadBundle\Entity\SettingsGrackaKompProdhuse $ferromoniKompaniaProdhuese = null)
    {
        $this->ferromoniKompaniaProdhuese = $ferromoniKompaniaProdhuese;

        return $this;
    }

    /**
     * Get ferromoniKompaniaProdhuese
     *
     * @return \AiadBundle\Entity\SettingsGrackaKompProdhuse 
     */
    public function getFerromoniKompaniaProdhuese()
    {
        return $this->ferromoniKompaniaProdhuese;
    }

    /**
     * Set ferromoniKompaniaShperndarese
     *
     * @param \AiadBundle\Entity\SettingsGrackaKompShperndarese $ferromoniKompaniaShperndarese
     * @return NderhyrjetGrackaMasive
     */
    public function setFerromoniKompaniaShperndarese(\AiadBundle\Entity\SettingsGrackaKompShperndarese $ferromoniKompaniaShperndarese = null)
    {
        $this->ferromoniKompaniaShperndarese = $ferromoniKompaniaShperndarese;

        return $this;
    }

    /**
     * Get ferromoniKompaniaShperndarese
     *
     * @return \AiadBundle\Entity\SettingsGrackaKompShperndarese 
     */
    public function getFerromoniKompaniaShperndarese()
    {
        return $this->ferromoniKompaniaShperndarese;
    }
}
