<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetMbulesaTokes
 *
 * @ORM\Table(name="nderhyrjet_mbulesa_tokes", indexes={@ORM\Index(name="fk_menyra_eleminimit_mbuleses_idx", columns={"menyra_eliminimit"}), @ORM\Index(name="fk_mbulesa_tokes_parcela_idx", columns={"parcela"}), @ORM\Index(name="fk_specia_mbjellur_idx", columns={"specia_mbjelle"})})
 * @ORM\Entity
 */
class NderhyrjetMbulesaTokes
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
     * @ORM\Column(name="data_mbulesa_tokes", type="date", nullable=true)
     */
    private $dataMbulesaTokes;

    /**
     * @var float
     *
     * @ORM\Column(name="doza_mbjelljes", type="float", precision=10, scale=0, nullable=true)
     */
    private $dozaMbjelljes;

    /**
     * @var float
     *
     * @ORM\Column(name="sip_mbjelljes", type="float", precision=10, scale=0, nullable=true)
     */
    private $sipMbjelljes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_eliminimit", type="date", nullable=true)
     */
    private $dataEliminimit;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=200, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsMenyraEleminimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsMenyraEleminimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menyra_eliminimit", referencedColumnName="id")
     * })
     */
    private $menyraEliminimit;

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
     * @var \SettingsMtokesSpeciamb
     *
     * @ORM\ManyToOne(targetEntity="SettingsMtokesSpeciamb")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="specia_mbjelle", referencedColumnName="id")
     * })
     */
    private $speciaMbjelle;



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
     * Set dozaMbjelljes
     *
     * @param float $dozaMbjelljes
     * @return NderhyrjetMbulesaTokes
     */
    public function setDozaMbjelljes($dozaMbjelljes)
    {
        $this->dozaMbjelljes = $dozaMbjelljes;

        return $this;
    }

    /**
     * Get dozaMbjelljes
     *
     * @return float 
     */
    public function getDozaMbjelljes()
    {
        return $this->dozaMbjelljes;
    }

    /**
     * Set sipMbjelljes
     *
     * @param float $sipMbjelljes
     * @return NderhyrjetMbulesaTokes
     */
    public function setSipMbjelljes($sipMbjelljes)
    {
        $this->sipMbjelljes = $sipMbjelljes;

        return $this;
    }

    /**
     * Get sipMbjelljes
     *
     * @return float 
     */
    public function getSipMbjelljes()
    {
        return $this->sipMbjelljes;
    }


    /**
     * Set dataMbulesaTokes
     *
     * @param \DateTime $dataMbulesaTokes
     * @return NderhyrjetMbulesaTokes
     */
    public function setDataMbulesaTokes($dataMbulesaTokes)
    {
        $this->dataMbulesaTokes = $dataMbulesaTokes;

        return $this;
    }

    /**
     * Get dataMbulesaTokes
     *
     * @return \DateTime
     */
    public function getDataMbulesaTokes()
    {
        return $this->dataMbulesaTokes;
    }


    /**
     * Set dataEliminimit
     *
     * @param \DateTime $dataEliminimit
     * @return NderhyrjetMbulesaTokes
     */
    public function setDataEliminimit($dataEliminimit)
    {
        $this->dataEliminimit = $dataEliminimit;

        return $this;
    }

    /**
     * Get dataEliminimit
     *
     * @return \DateTime 
     */
    public function getDataEliminimit()
    {
        return $this->dataEliminimit;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetMbulesaTokes
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
     * Set menyraEliminimit
     *
     * @param \AiadBundle\Entity\SettingsMenyraEleminimit $menyraEliminimit
     * @return NderhyrjetMbulesaTokes
     */
    public function setMenyraEliminimit(\AiadBundle\Entity\SettingsMenyraEleminimit $menyraEliminimit = null)
    {
        $this->menyraEliminimit = $menyraEliminimit;

        return $this;
    }

    /**
     * Get menyraEliminimit
     *
     * @return \AiadBundle\Entity\SettingsMenyraEleminimit 
     */
    public function getMenyraEliminimit()
    {
        return $this->menyraEliminimit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetMbulesaTokes
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
     * Set speciaMbjelle
     *
     * @param \AiadBundle\Entity\SettingsMtokesSpeciamb $speciaMbjelle
     * @return NderhyrjetMbulesaTokes
     */
    public function setSpeciaMbjelle(\AiadBundle\Entity\SettingsMtokesSpeciamb $speciaMbjelle = null)
    {
        $this->speciaMbjelle = $speciaMbjelle;

        return $this;
    }

    /**
     * Get speciaMbjelle
     *
     * @return \AiadBundle\Entity\SettingsMtokesSpeciamb 
     */
    public function getSpeciaMbjelle()
    {
        return $this->speciaMbjelle;
    }
}
