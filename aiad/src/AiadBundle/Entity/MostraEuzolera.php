<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraEuzolera
 *
 * @ORM\Table(name="mostra_euzolera", indexes={@ORM\Index(name="fk_parcela_euzolera_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraEuzolera
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
     * @ORM\Column(name="data_euzolera", type="date", nullable=true)
     */
    private $dataEuzolera;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_jashtqitje_peme", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioJashtqitjePeme;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_territur_gracke", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioTerriturGracke;

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
     * Set dataEuzolera
     *
     * @param \DateTime $dataEuzolera
     * @return MostraEuzolera
     */
    public function setDataEuzolera($dataEuzolera)
    {
        $this->dataEuzolera = $dataEuzolera;

        return $this;
    }

    /**
     * Get dataEuzolera
     *
     * @return \DateTime 
     */
    public function getDataEuzolera()
    {
        return $this->dataEuzolera;
    }

    /**
     * Set ratioJashtqitjePeme
     *
     * @param float $ratioJashtqitjePeme
     * @return MostraEuzolera
     */
    public function setRatioJashtqitjePeme($ratioJashtqitjePeme)
    {
        $this->ratioJashtqitjePeme = $ratioJashtqitjePeme;

        return $this;
    }

    /**
     * Get ratioJashtqitjePeme
     *
     * @return float 
     */
    public function getRatioJashtqitjePeme()
    {
        return $this->ratioJashtqitjePeme;
    }

    /**
     * Set ratioTerriturGracke
     *
     * @param float $ratioTerriturGracke
     * @return MostraEuzolera
     */
    public function setRatioTerriturGracke($ratioTerriturGracke)
    {
        $this->ratioTerriturGracke = $ratioTerriturGracke;

        return $this;
    }

    /**
     * Get ratioTerriturGracke
     *
     * @return float 
     */
    public function getRatioTerriturGracke()
    {
        return $this->ratioTerriturGracke;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraEuzolera
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
