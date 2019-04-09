<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetUjitje
 *
 * @ORM\Table(name="nderhyrjet_ujitje", indexes={@ORM\Index(name="fk_nderhyrje_origjina_ujit_idx", columns={"origjina_ujit"}), @ORM\Index(name="fk_nderhyrje_cilesia_ujit_idx", columns={"cilesia_ujit"}), @ORM\Index(name="fk_nderhyrje_arsyeja_ujitjes_idx", columns={"arsyeja_ujitjes"}), @ORM\Index(name="fk_nderhyrje_ujitje_parcela_idx", columns={"parcela"}), @ORM\Index(name="fk_nderhyrje_sistemi_ujitjes_idx", columns={"sistemi_ujitjes"})})
 * @ORM\Entity
 */
class NderhyrjetUjitje
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
     * @ORM\Column(name="data_ujitjes", type="date", nullable=true)
     */
    private $dataUjitjes;

    /**
     * @var float
     *
     * @ORM\Column(name="sasia_ujit", type="float", precision=10, scale=0, nullable=true)
     */
    private $sasiaUjit;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=200, nullable=true)
     */
    private $vezhgime;

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
     * @var \SettingsArsyeUjitje
     *
     * @ORM\ManyToOne(targetEntity="SettingsArsyeUjitje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arsyeja_ujitjes", referencedColumnName="id")
     * })
     */
    private $arsyejaUjitjes;

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
     * @var \SettingsSistemiUjitjes
     *
     * @ORM\ManyToOne(targetEntity="SettingsSistemiUjitjes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sistemi_ujitjes", referencedColumnName="id")
     * })
     */
    private $sistemiUjitjes;



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
     * Set dataUjitjes
     *
     * @param \DateTime $dataUjitjes
     * @return NderhyrjetUjitje
     */
    public function setDataUjitjes($dataUjitjes)
    {
        $this->dataUjitjes = $dataUjitjes;

        return $this;
    }

    /**
     * Get dataUjitjes
     *
     * @return \DateTime 
     */
    public function getDataUjitjes()
    {
        return $this->dataUjitjes;
    }

    /**
     * Set sasiaUjit
     *
     * @param float $sasiaUjit
     * @return NderhyrjetUjitje
     */
    public function setSasiaUjit($sasiaUjit)
    {
        $this->sasiaUjit = $sasiaUjit;

        return $this;
    }

    /**
     * Get sasiaUjit
     *
     * @return float 
     */
    public function getSasiaUjit()
    {
        return $this->sasiaUjit;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetUjitje
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
     * Set origjinaUjit
     *
     * @param \AiadBundle\Entity\SettingsOrigjinaUjit $origjinaUjit
     * @return NderhyrjetUjitje
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
     * @return NderhyrjetUjitje
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
     * Set arsyejaUjitjes
     *
     * @param \AiadBundle\Entity\SettingsArsyeUjitje $arsyejaUjitjes
     * @return NderhyrjetUjitje
     */
    public function setArsyejaUjitjes(\AiadBundle\Entity\SettingsArsyeUjitje $arsyejaUjitjes = null)
    {
        $this->arsyejaUjitjes = $arsyejaUjitjes;

        return $this;
    }

    /**
     * Get arsyejaUjitjes
     *
     * @return \AiadBundle\Entity\SettingsArsyeUjitje 
     */
    public function getArsyejaUjitjes()
    {
        return $this->arsyejaUjitjes;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetUjitje
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
     * Set sistemiUjitjes
     *
     * @param \AiadBundle\Entity\SettingsSistemiUjitjes $sistemiUjitjes
     * @return NderhyrjetUjitje
     */
    public function setSistemiUjitjes(\AiadBundle\Entity\SettingsSistemiUjitjes $sistemiUjitjes = null)
    {
        $this->sistemiUjitjes = $sistemiUjitjes;

        return $this;
    }

    /**
     * Get sistemiUjitjes
     *
     * @return \AiadBundle\Entity\SettingsSistemiUjitjes 
     */
    public function getSistemiUjitjes()
    {
        return $this->sistemiUjitjes;
    }
}
