<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraPraisStadiLarvor
 *
 * @ORM\Table(name="mostra_prais_stadi_larvor", indexes={@ORM\Index(name="fk_parcela_stadi_larvor_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraPraisStadiLarvor
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
     * @ORM\Column(name="data_prais_stadi_larvor", type="date", nullable=true)
     */
    private $dataPraisStadiLarvor;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_nrprais_kurthdite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioNrpraisKurthdite;

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
     * Set dataPraisStadiLarvor
     *
     * @param \DateTime $dataPraisStadiLarvor
     * @return MostraPraisStadiLarvor
     */
    public function setDataPraisStadiLarvor($dataPraisStadiLarvor)
    {
        $this->dataPraisStadiLarvor = $dataPraisStadiLarvor;

        return $this;
    }

    /**
     * Get dataPraisStadiLarvor
     *
     * @return \DateTime 
     */
    public function getDataPraisStadiLarvor()
    {
        return $this->dataPraisStadiLarvor;
    }

    /**
     * Set ratioNrpraisKurthdite
     *
     * @param float $ratioNrpraisKurthdite
     * @return MostraPraisStadiLarvor
     */
    public function setRatioNrpraisKurthdite($ratioNrpraisKurthdite)
    {
        $this->ratioNrpraisKurthdite = $ratioNrpraisKurthdite;

        return $this;
    }

    /**
     * Get ratioNrpraisKurthdite
     *
     * @return float 
     */
    public function getRatioNrpraisKurthdite()
    {
        return $this->ratioNrpraisKurthdite;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraPraisStadiLarvor
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
