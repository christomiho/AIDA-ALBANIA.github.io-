<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetVjelja
 *
 * @ORM\Table(name="nderhyrjet_vjelja", indexes={@ORM\Index(name="fk_lloji_ullirit_idx", columns={"lloji_ullinjve"}), @ORM\Index(name="fk_menyra_vjeljes_idx", columns={"menyra_vjeljes"}), @ORM\Index(name="fk_cilesia_vajit_idx", columns={"cilesia_vajit"}), @ORM\Index(name="fk_vjelja_parcela_idx", columns={"parcela"}), @ORM\Index(name="fk_destinacioni_idx", columns={"vjelja_destinacioni"}), @ORM\Index(name="fk_prejardhja_frutit_idx", columns={"prejardhja_frutit"})})
 * @ORM\Entity
 */
class NderhyrjetVjelja
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
     * @ORM\Column(name="data_vjeljes", type="date", nullable=true)
     */
    private $dataVjeljes;

    /**
     * @var float
     *
     * @ORM\Column(name="rendimenti", type="float", precision=10, scale=0, nullable=true)
     */
    private $rendimenti;

    /**
     * @var float
     *
     * @ORM\Column(name="indeksi_pjekjes", type="float", precision=10, scale=0, nullable=true)
     */
    private $indeksiPjekjes;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_rendimenti_yndyror", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeRendimentiYndyror;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_aciditeti", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeAciditeti;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=200, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsLlojiUllinjve
     *
     * @ORM\ManyToOne(targetEntity="SettingsLlojiUllinjve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lloji_ullinjve", referencedColumnName="id")
     * })
     */
    private $llojiUllinjve;

    /**
     * @var \SettingsMenyraVjeljes
     *
     * @ORM\ManyToOne(targetEntity="SettingsMenyraVjeljes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menyra_vjeljes", referencedColumnName="id")
     * })
     */
    private $menyraVjeljes;

    /**
     * @var \SettingsCilesiaVajit
     *
     * @ORM\ManyToOne(targetEntity="SettingsCilesiaVajit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cilesia_vajit", referencedColumnName="id")
     * })
     */
    private $cilesiaVajit;

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
     * @var \SettingsVjeljaDestinacioni
     *
     * @ORM\ManyToOne(targetEntity="SettingsVjeljaDestinacioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vjelja_destinacioni", referencedColumnName="id")
     * })
     */
    private $vjeljaDestinacioni;

    /**
     * @var \SettingsPrejardhjaFrutit
     *
     * @ORM\ManyToOne(targetEntity="SettingsPrejardhjaFrutit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prejardhja_frutit", referencedColumnName="id")
     * })
     */
    private $prejardhjaFrutit;



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
     * Set dataVjeljes
     *
     * @param \DateTime $dataVjeljes
     * @return NderhyrjetVjelja
     */
    public function setDataVjeljes($dataVjeljes)
    {
        $this->dataVjeljes = $dataVjeljes;

        return $this;
    }

    /**
     * Get dataVjeljes
     *
     * @return \DateTime 
     */
    public function getDataVjeljes()
    {
        return $this->dataVjeljes;
    }

    /**
     * Set rendimenti
     *
     * @param float $rendimenti
     * @return NderhyrjetVjelja
     */
    public function setRendimenti($rendimenti)
    {
        $this->rendimenti = $rendimenti;

        return $this;
    }

    /**
     * Get rendimenti
     *
     * @return float 
     */
    public function getRendimenti()
    {
        return $this->rendimenti;
    }

    /**
     * Set indeksiPjekjes
     *
     * @param float $indeksiPjekjes
     * @return NderhyrjetVjelja
     */
    public function setIndeksiPjekjes($indeksiPjekjes)
    {
        $this->indeksiPjekjes = $indeksiPjekjes;

        return $this;
    }

    /**
     * Get indeksiPjekjes
     *
     * @return float 
     */
    public function getIndeksiPjekjes()
    {
        return $this->indeksiPjekjes;
    }

    /**
     * Set perqindjeRendimentiYndyror
     *
     * @param float $perqindjeRendimentiYndyror
     * @return NderhyrjetVjelja
     */
    public function setPerqindjeRendimentiYndyror($perqindjeRendimentiYndyror)
    {
        $this->perqindjeRendimentiYndyror = $perqindjeRendimentiYndyror;

        return $this;
    }

    /**
     * Get perqindjeRendimentiYndyror
     *
     * @return float 
     */
    public function getPerqindjeRendimentiYndyror()
    {
        return $this->perqindjeRendimentiYndyror;
    }

    /**
     * Set perqindjeAciditeti
     *
     * @param float $perqindjeAciditeti
     * @return NderhyrjetVjelja
     */
    public function setPerqindjeAciditeti($perqindjeAciditeti)
    {
        $this->perqindjeAciditeti = $perqindjeAciditeti;

        return $this;
    }

    /**
     * Get perqindjeAciditeti
     *
     * @return float 
     */
    public function getPerqindjeAciditeti()
    {
        return $this->perqindjeAciditeti;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetVjelja
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
     * Set llojiUllinjve
     *
     * @param \AiadBundle\Entity\SettingsLlojiUllinjve $llojiUllinjve
     * @return NderhyrjetVjelja
     */
    public function setLlojiUllinjve(\AiadBundle\Entity\SettingsLlojiUllinjve $llojiUllinjve = null)
    {
        $this->llojiUllinjve = $llojiUllinjve;

        return $this;
    }

    /**
     * Get llojiUllinjve
     *
     * @return \AiadBundle\Entity\SettingsLlojiUllinjve 
     */
    public function getLlojiUllinjve()
    {
        return $this->llojiUllinjve;
    }

    /**
     * Set menyraVjeljes
     *
     * @param \AiadBundle\Entity\SettingsMenyraVjeljes $menyraVjeljes
     * @return NderhyrjetVjelja
     */
    public function setMenyraVjeljes(\AiadBundle\Entity\SettingsMenyraVjeljes $menyraVjeljes = null)
    {
        $this->menyraVjeljes = $menyraVjeljes;

        return $this;
    }

    /**
     * Get menyraVjeljes
     *
     * @return \AiadBundle\Entity\SettingsMenyraVjeljes 
     */
    public function getMenyraVjeljes()
    {
        return $this->menyraVjeljes;
    }

    /**
     * Set cilesiaVajit
     *
     * @param \AiadBundle\Entity\SettingsCilesiaVajit $cilesiaVajit
     * @return NderhyrjetVjelja
     */
    public function setCilesiaVajit(\AiadBundle\Entity\SettingsCilesiaVajit $cilesiaVajit = null)
    {
        $this->cilesiaVajit = $cilesiaVajit;

        return $this;
    }

    /**
     * Get cilesiaVajit
     *
     * @return \AiadBundle\Entity\SettingsCilesiaVajit 
     */
    public function getCilesiaVajit()
    {
        return $this->cilesiaVajit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetVjelja
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
     * Set vjeljaDestinacioni
     *
     * @param \AiadBundle\Entity\SettingsVjeljaDestinacioni $vjeljaDestinacioni
     * @return NderhyrjetVjelja
     */
    public function setVjeljaDestinacioni(\AiadBundle\Entity\SettingsVjeljaDestinacioni $vjeljaDestinacioni = null)
    {
        $this->vjeljaDestinacioni = $vjeljaDestinacioni;

        return $this;
    }

    /**
     * Get vjeljaDestinacioni
     *
     * @return \AiadBundle\Entity\SettingsVjeljaDestinacioni 
     */
    public function getVjeljaDestinacioni()
    {
        return $this->vjeljaDestinacioni;
    }

    /**
     * Set prejardhjaFrutit
     *
     * @param \AiadBundle\Entity\SettingsPrejardhjaFrutit $prejardhjaFrutit
     * @return NderhyrjetVjelja
     */
    public function setPrejardhjaFrutit(\AiadBundle\Entity\SettingsPrejardhjaFrutit $prejardhjaFrutit = null)
    {
        $this->prejardhjaFrutit = $prejardhjaFrutit;

        return $this;
    }

    /**
     * Get prejardhjaFrutit
     *
     * @return \AiadBundle\Entity\SettingsPrejardhjaFrutit 
     */
    public function getPrejardhjaFrutit()
    {
        return $this->prejardhjaFrutit;
    }
}
