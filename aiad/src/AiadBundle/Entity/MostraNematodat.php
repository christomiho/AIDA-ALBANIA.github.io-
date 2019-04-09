<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraNematodat
 *
 * @ORM\Table(name="mostra_nematodat", indexes={@ORM\Index(name="fk_parcela_nematodat_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraNematodat
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
     * @ORM\Column(name="data_nematodat", type="date", nullable=true)
     */
    private $dataNematodat;

    /**
     * @var float
     *
     * @ORM\Column(name="peme_prekura", type="float", precision=10, scale=0, nullable=true)
     */
    private $pemePrekura;

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
     * Set dataNematodat
     *
     * @param \DateTime $dataNematodat
     * @return MostraNematodat
     */
    public function setDataNematodat($dataNematodat)
    {
        $this->dataNematodat = $dataNematodat;

        return $this;
    }

    /**
     * Get dataNematodat
     *
     * @return \DateTime 
     */
    public function getDataNematodat()
    {
        return $this->dataNematodat;
    }

    /**
     * Set pemePrekura
     *
     * @param float $pemePrekura
     * @return MostraNematodat
     */
    public function setPemePrekura($pemePrekura)
    {
        $this->pemePrekura = $pemePrekura;

        return $this;
    }

    /**
     * Get pemePrekura
     *
     * @return float 
     */
    public function getPemePrekura()
    {
        return $this->pemePrekura;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraNematodat
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
