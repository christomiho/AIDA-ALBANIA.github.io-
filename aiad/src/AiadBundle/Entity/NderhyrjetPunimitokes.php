<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetPunimitokes
 *
 * @ORM\Table(name="nderhyrjet_punimitokes", indexes={@ORM\Index(name="fk_punimitokes_mjeti_idx", columns={"mjeti_perdorur"}), @ORM\Index(name="fk_shperndarja_punimittokes_idx", columns={"shperndarja_punimit"}), @ORM\Index(name="fk_tipi_punimittokes_idx", columns={"tipi_punimit"}), @ORM\Index(name="fk_arsyeja_punimittokes_idx", columns={"tipi_punimit_arsyeja"}), @ORM\Index(name="fk_parcela_punimitokes_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class NderhyrjetPunimitokes
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
     * @ORM\Column(name="data_punimit_tokes", type="date", nullable=true)
     */
    private $dataPunimitTokes;

    /**
     * @var float
     *
     * @ORM\Column(name="sip_punuar", type="float", precision=10, scale=0, nullable=true)
     */
    private $sipPunuar;

    /**
     * @var float
     *
     * @ORM\Column(name="thellesia_max_punimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $thellesiaMaxPunimit;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=150, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsMjete
     *
     * @ORM\ManyToOne(targetEntity="SettingsMjete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mjeti_perdorur", referencedColumnName="id")
     * })
     */
    private $mjetiPerdorur;

    /**
     * @var \SettingsShperndarjaPunimitTokes
     *
     * @ORM\ManyToOne(targetEntity="SettingsShperndarjaPunimitTokes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shperndarja_punimit", referencedColumnName="id")
     * })
     */
    private $shperndarjaPunimit;

    /**
     * @var \SettingsTipiPunimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsTipiPunimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi_punimit", referencedColumnName="id")
     * })
     */
    private $tipiPunimit;

    /**
     * @var \SettingsArsyejaTipitPunimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsArsyejaTipitPunimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi_punimit_arsyeja", referencedColumnName="id")
     * })
     */
    private $tipiPunimitArsyeja;

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
     * Set dataPunimitTokes
     *
     * @param \DateTime $dataPunimitTokes
     * @return NderhyrjetPunimitokes
     */
    public function setDataPunimitTokes($dataPunimitTokes)
    {
        $this->dataPunimitTokes = $dataPunimitTokes;

        return $this;
    }

    /**
     * Get dataPunimitTokes
     *
     * @return \DateTime 
     */
    public function getDataPunimitTokes()
    {
        return $this->dataPunimitTokes;
    }

    /**
     * Set sipPunuar
     *
     * @param float $sipPunuar
     * @return NderhyrjetPunimitokes
     */
    public function setSipPunuar($sipPunuar)
    {
        $this->sipPunuar = $sipPunuar;

        return $this;
    }

    /**
     * Get sipPunuar
     *
     * @return float 
     */
    public function getSipPunuar()
    {
        return $this->sipPunuar;
    }

    /**
     * Set thellesiaMaxPunimit
     *
     * @param float $thellesiaMaxPunimit
     * @return NderhyrjetPunimitokes
     */
    public function setThellesiaMaxPunimit($thellesiaMaxPunimit)
    {
        $this->thellesiaMaxPunimit = $thellesiaMaxPunimit;

        return $this;
    }

    /**
     * Get thellesiaMaxPunimit
     *
     * @return float 
     */
    public function getThellesiaMaxPunimit()
    {
        return $this->thellesiaMaxPunimit;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetPunimitokes
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
     * Set mjetiPerdorur
     *
     * @param \AiadBundle\Entity\SettingsMjete $mjetiPerdorur
     * @return NderhyrjetPunimitokes
     */
    public function setMjetiPerdorur(\AiadBundle\Entity\SettingsMjete $mjetiPerdorur = null)
    {
        $this->mjetiPerdorur = $mjetiPerdorur;

        return $this;
    }

    /**
     * Get mjetiPerdorur
     *
     * @return \AiadBundle\Entity\SettingsMjete 
     */
    public function getMjetiPerdorur()
    {
        return $this->mjetiPerdorur;
    }

    /**
     * Set shperndarjaPunimit
     *
     * @param \AiadBundle\Entity\SettingsShperndarjaPunimitTokes $shperndarjaPunimit
     * @return NderhyrjetPunimitokes
     */
    public function setShperndarjaPunimit(\AiadBundle\Entity\SettingsShperndarjaPunimitTokes $shperndarjaPunimit = null)
    {
        $this->shperndarjaPunimit = $shperndarjaPunimit;

        return $this;
    }

    /**
     * Get shperndarjaPunimit
     *
     * @return \AiadBundle\Entity\SettingsShperndarjaPunimitTokes 
     */
    public function getShperndarjaPunimit()
    {
        return $this->shperndarjaPunimit;
    }

    /**
     * Set tipiPunimit
     *
     * @param \AiadBundle\Entity\SettingsTipiPunimit $tipiPunimit
     * @return NderhyrjetPunimitokes
     */
    public function setTipiPunimit(\AiadBundle\Entity\SettingsTipiPunimit $tipiPunimit = null)
    {
        $this->tipiPunimit = $tipiPunimit;

        return $this;
    }

    /**
     * Get tipiPunimit
     *
     * @return \AiadBundle\Entity\SettingsTipiPunimit 
     */
    public function getTipiPunimit()
    {
        return $this->tipiPunimit;
    }

    /**
     * Set tipiPunimitArsyeja
     *
     * @param \AiadBundle\Entity\SettingsArsyejaTipitPunimit $tipiPunimitArsyeja
     * @return NderhyrjetPunimitokes
     */
    public function setTipiPunimitArsyeja(\AiadBundle\Entity\SettingsArsyejaTipitPunimit $tipiPunimitArsyeja = null)
    {
        $this->tipiPunimitArsyeja = $tipiPunimitArsyeja;

        return $this;
    }

    /**
     * Get tipiPunimitArsyeja
     *
     * @return \AiadBundle\Entity\SettingsArsyejaTipitPunimit 
     */
    public function getTipiPunimitArsyeja()
    {
        return $this->tipiPunimitArsyeja;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetPunimitokes
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
