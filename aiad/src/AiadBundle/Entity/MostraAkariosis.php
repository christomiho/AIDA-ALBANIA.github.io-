<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraAkariosis
 *
 * @ORM\Table(name="mostra_akariosis", indexes={@ORM\Index(name="fk_parcela_akariosis_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraAkariosis
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
     * @ORM\Column(name="data_akariosis", type="date", nullable=true)
     */
    private $dataAkariosis;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_degezaprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeDegezaprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastareprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastareprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_frutadeformuar", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutadeformuar;

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
     * Set dataAkariosis
     *
     * @param \DateTime $dataAkariosis
     * @return MostraAkariosis
     */
    public function setDataAkariosis($dataAkariosis)
    {
        $this->dataAkariosis = $dataAkariosis;

        return $this;
    }

    /**
     * Get dataAkariosis
     *
     * @return \DateTime 
     */
    public function getDataAkariosis()
    {
        return $this->dataAkariosis;
    }

    /**
     * Set perqindjeDegezaprekur
     *
     * @param float $perqindjeDegezaprekur
     * @return MostraAkariosis
     */
    public function setPerqindjeDegezaprekur($perqindjeDegezaprekur)
    {
        $this->perqindjeDegezaprekur = $perqindjeDegezaprekur;

        return $this;
    }

    /**
     * Get perqindjeDegezaprekur
     *
     * @return float 
     */
    public function getPerqindjeDegezaprekur()
    {
        return $this->perqindjeDegezaprekur;
    }

    /**
     * Set perqindjeLastareprekur
     *
     * @param float $perqindjeLastareprekur
     * @return MostraAkariosis
     */
    public function setPerqindjeLastareprekur($perqindjeLastareprekur)
    {
        $this->perqindjeLastareprekur = $perqindjeLastareprekur;

        return $this;
    }

    /**
     * Get perqindjeLastareprekur
     *
     * @return float 
     */
    public function getPerqindjeLastareprekur()
    {
        return $this->perqindjeLastareprekur;
    }

    /**
     * Set perqindjeFrutadeformuar
     *
     * @param float $perqindjeFrutadeformuar
     * @return MostraAkariosis
     */
    public function setPerqindjeFrutadeformuar($perqindjeFrutadeformuar)
    {
        $this->perqindjeFrutadeformuar = $perqindjeFrutadeformuar;

        return $this;
    }

    /**
     * Get perqindjeFrutadeformuar
     *
     * @return float 
     */
    public function getPerqindjeFrutadeformuar()
    {
        return $this->perqindjeFrutadeformuar;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraAkariosis
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
