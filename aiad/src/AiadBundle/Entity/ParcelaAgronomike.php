<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcelaAgronomike
 *
 * @ORM\Table(name="parcela_agronomike", indexes={@ORM\Index(name="fk_parcela_agronomi_idx", columns={"parcela"}), @ORM\Index(name="fk_orientimi_agronomi_idx", columns={"orientimi"}), @ORM\Index(name="fk_ujitje_agronomi_idx", columns={"ujitje"}), @ORM\Index(name="fk_sistem_ujitje_agronomi_idx", columns={"sistemi_ujitje"}), @ORM\Index(name="fk_origjona_ujit_agronomi_idx", columns={"origjina_ujit"}), @ORM\Index(name="fk_cilesia_ujit_agronomi_idx", columns={"cilesia_ujit"}), @ORM\Index(name="fk_mbulesa_bimore_agronomi_idx", columns={"mbulesa_bimore_tokes"}), @ORM\Index(name="fk_lloji_mbuleses_agronomi_idx", columns={"lloji_mbuleses"})})
 * @ORM\Entity
 */
class ParcelaAgronomike
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
     * @var float
     *
     * @ORM\Column(name="pjerresia", type="float", precision=10, scale=0, nullable=true)
     */
    private $pjerresia;

    /**
     * @var float
     *
     * @ORM\Column(name="siperfaqja", type="float", precision=10, scale=0, nullable=true)
     */
    private $siperfaqja;

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
     * @var \SettingsOrientimi
     *
     * @ORM\ManyToOne(targetEntity="SettingsOrientimi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orientimi", referencedColumnName="id")
     * })
     */
    private $orientimi;

    /**
     * @var \SettingsUjitje
     *
     * @ORM\ManyToOne(targetEntity="SettingsUjitje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ujitje", referencedColumnName="id")
     * })
     */
    private $ujitje;

    /**
     * @var \SettingsSistemiUjitjes
     *
     * @ORM\ManyToOne(targetEntity="SettingsSistemiUjitjes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sistemi_ujitje", referencedColumnName="id")
     * })
     */
    private $sistemiUjitje;

    /**
     * @var \SettingsOrigjinaUjit
     *
     * @ORM\ManyToOne(targetEntity="SettingsOrigjinaUjit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="origjina_ujit", referencedColumnName="id")
     * })
     */
    private $origjinaUjit;

    /**
     * @var \SettingsCilesiaUjit
     *
     * @ORM\ManyToOne(targetEntity="SettingsCilesiaUjit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cilesia_ujit", referencedColumnName="id")
     * })
     */
    private $cilesiaUjit;

    /**
     * @var \SettingsMbulesaBimoreTokes
     *
     * @ORM\ManyToOne(targetEntity="SettingsMbulesaBimoreTokes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mbulesa_bimore_tokes", referencedColumnName="id")
     * })
     */
    private $mbulesaBimoreTokes;

    /**
     * @var \SettingsLlojiMbulesesBimore
     *
     * @ORM\ManyToOne(targetEntity="SettingsLlojiMbulesesBimore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lloji_mbuleses", referencedColumnName="id")
     * })
     */
    private $llojiMbuleses;



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
     * Set pjerresia
     *
     * @param float $pjerresia
     * @return ParcelaAgronomike
     */
    public function setPjerresia($pjerresia)
    {
        $this->pjerresia = $pjerresia;

        return $this;
    }

    /**
     * Get pjerresia
     *
     * @return float 
     */
    public function getPjerresia()
    {
        return $this->pjerresia;
    }

    /**
     * Set siperfaqja
     *
     * @param float $siperfaqja
     * @return ParcelaAgronomike
     */
    public function setSiperfaqja($siperfaqja)
    {
        $this->siperfaqja = $siperfaqja;

        return $this;
    }

    /**
     * Get siperfaqja
     *
     * @return float 
     */
    public function getSiperfaqja()
    {
        return $this->siperfaqja;
    }

    /**
     * Set vezhgimeTjera
     *
     * @param string $vezhgimeTjera
     * @return ParcelaAgronomike
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
     * @return ParcelaAgronomike
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
     * Set orientimi
     *
     * @param \AiadBundle\Entity\SettingsOrientimi $orientimi
     * @return ParcelaAgronomike
     */
    public function setOrientimi(\AiadBundle\Entity\SettingsOrientimi $orientimi = null)
    {
        $this->orientimi = $orientimi;

        return $this;
    }

    /**
     * Get orientimi
     *
     * @return \AiadBundle\Entity\SettingsOrientimi 
     */
    public function getOrientimi()
    {
        return $this->orientimi;
    }

    /**
     * Set ujitje
     *
     * @param \AiadBundle\Entity\SettingsUjitje $ujitje
     * @return ParcelaAgronomike
     */
    public function setUjitje(\AiadBundle\Entity\SettingsUjitje $ujitje = null)
    {
        $this->ujitje = $ujitje;

        return $this;
    }

    /**
     * Get ujitje
     *
     * @return \AiadBundle\Entity\SettingsUjitje 
     */
    public function getUjitje()
    {
        return $this->ujitje;
    }

    /**
     * Set sistemiUjitje
     *
     * @param \AiadBundle\Entity\SettingsSistemiUjitjes $sistemiUjitje
     * @return ParcelaAgronomike
     */
    public function setSistemiUjitje(\AiadBundle\Entity\SettingsSistemiUjitjes $sistemiUjitje = null)
    {
        $this->sistemiUjitje = $sistemiUjitje;

        return $this;
    }

    /**
     * Get sistemiUjitje
     *
     * @return \AiadBundle\Entity\SettingsSistemiUjitjes 
     */
    public function getSistemiUjitje()
    {
        return $this->sistemiUjitje;
    }

    /**
     * Set origjinaUjit
     *
     * @param \AiadBundle\Entity\SettingsOrigjinaUjit $origjinaUjit
     * @return ParcelaAgronomike
     */
    public function setOrigjinaUjit(\AiadBundle\Entity\SettingsOrigjinaUjit $origjinaUjit = null)
    {
        $this->origjinaUjit = $origjinaUjit;

        return $this;
    }

    /**
     * Get origjinaUjit
     *
     * @return \AiadBundle\Entity\SettingsOrigjinaUjit 
     */
    public function getOrigjinaUjit()
    {
        return $this->origjinaUjit;
    }

    /**
     * Set cilesiaUjit
     *
     * @param \AiadBundle\Entity\SettingsCilesiaUjit $cilesiaUjit
     * @return ParcelaAgronomike
     */
    public function setCilesiaUjit(\AiadBundle\Entity\SettingsCilesiaUjit $cilesiaUjit = null)
    {
        $this->cilesiaUjit = $cilesiaUjit;

        return $this;
    }

    /**
     * Get cilesiaUjit
     *
     * @return \AiadBundle\Entity\SettingsCilesiaUjit 
     */
    public function getCilesiaUjit()
    {
        return $this->cilesiaUjit;
    }

    /**
     * Set mbulesaBimoreTokes
     *
     * @param \AiadBundle\Entity\SettingsMbulesaBimoreTokes $mbulesaBimoreTokes
     * @return ParcelaAgronomike
     */
    public function setMbulesaBimoreTokes(\AiadBundle\Entity\SettingsMbulesaBimoreTokes $mbulesaBimoreTokes = null)
    {
        $this->mbulesaBimoreTokes = $mbulesaBimoreTokes;

        return $this;
    }

    /**
     * Get mbulesaBimoreTokes
     *
     * @return \AiadBundle\Entity\SettingsMbulesaBimoreTokes 
     */
    public function getMbulesaBimoreTokes()
    {
        return $this->mbulesaBimoreTokes;
    }

    /**
     * Set llojiMbuleses
     *
     * @param \AiadBundle\Entity\SettingsLlojiMbulesesBimore $llojiMbuleses
     * @return ParcelaAgronomike
     */
    public function setLlojiMbuleses(\AiadBundle\Entity\SettingsLlojiMbulesesBimore $llojiMbuleses = null)
    {
        $this->llojiMbuleses = $llojiMbuleses;

        return $this;
    }

    /**
     * Get llojiMbuleses
     *
     * @return \AiadBundle\Entity\SettingsLlojiMbulesesBimore 
     */
    public function getLlojiMbuleses()
    {
        return $this->llojiMbuleses;
    }
}
