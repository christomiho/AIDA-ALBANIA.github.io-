<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetEliminimiMbetjes
 *
 * @ORM\Table(name="nderhyrjet_eliminimi_mbetjes", indexes={@ORM\Index(name="fk_lloji_mbetjeve_idx", columns={"lloji_mbetjeve"}), @ORM\Index(name="fk_menyra_eleminimit_mbetje_idx", columns={"menyra_eliminimit"}), @ORM\Index(name="fk_parcela_mbetje_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class NderhyrjetEliminimiMbetjes
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
     * @var \SettingsLlojiMbetjeve
     *
     * @ORM\ManyToOne(targetEntity="SettingsLlojiMbetjeve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lloji_mbetjeve", referencedColumnName="id")
     * })
     */
    private $llojiMbetjeve;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataEliminimit
     *
     * @param \DateTime $dataEliminimit
     * @return NderhyrjetEliminimiMbetjes
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
     * @return NderhyrjetEliminimiMbetjes
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
     * Set llojiMbetjeve
     *
     * @param \AiadBundle\Entity\SettingsLlojiMbetjeve $llojiMbetjeve
     * @return NderhyrjetEliminimiMbetjes
     */
    public function setLlojiMbetjeve(\AiadBundle\Entity\SettingsLlojiMbetjeve $llojiMbetjeve = null)
    {
        $this->llojiMbetjeve = $llojiMbetjeve;

        return $this;
    }

    /**
     * Get llojiMbetjeve
     *
     * @return \AiadBundle\Entity\SettingsLlojiMbetjeve 
     */
    public function getLlojiMbetjeve()
    {
        return $this->llojiMbetjeve;
    }

    /**
     * Set menyraEliminimit
     *
     * @param \AiadBundle\Entity\SettingsMenyraEleminimit $menyraEliminimit
     * @return NderhyrjetEliminimiMbetjes
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
     * @return NderhyrjetEliminimiMbetjes
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
