<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraLastareRinj
 *
 * @ORM\Table(name="mostra_lastare_rinj", indexes={@ORM\Index(name="fk_parcela_lastare_rinj_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraLastareRinj
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
     * @ORM\Column(name="data_lastare_rinj", type="date", nullable=true)
     */
    private $dataLastareRinj;

    /**
     * @var float
     *
     * @ORM\Column(name="gjatesia_mesatare", type="float", precision=10, scale=0, nullable=true)
     */
    private $gjatesiaMesatare;

    /**
     * @var float
     *
     * @ORM\Column(name="nr_mesatar_nyjesh", type="float", precision=10, scale=0, nullable=true)
     */
    private $nrMesatarNyjesh;

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
     * Set dataLastareRinj
     *
     * @param \DateTime $dataLastareRinj
     * @return MostraLastareRinj
     */
    public function setDataLastareRinj($dataLastareRinj)
    {
        $this->dataLastareRinj = $dataLastareRinj;

        return $this;
    }

    /**
     * Get dataLastareRinj
     *
     * @return \DateTime 
     */
    public function getDataLastareRinj()
    {
        return $this->dataLastareRinj;
    }

    /**
     * Set gjatesiaMesatare
     *
     * @param float $gjatesiaMesatare
     * @return MostraLastareRinj
     */
    public function setGjatesiaMesatare($gjatesiaMesatare)
    {
        $this->gjatesiaMesatare = $gjatesiaMesatare;

        return $this;
    }

    /**
     * Get gjatesiaMesatare
     *
     * @return float 
     */
    public function getGjatesiaMesatare()
    {
        return $this->gjatesiaMesatare;
    }

    /**
     * Set nrMesatarNyjesh
     *
     * @param float $nrMesatarNyjesh
     * @return MostraLastareRinj
     */
    public function setNrMesatarNyjesh($nrMesatarNyjesh)
    {
        $this->nrMesatarNyjesh = $nrMesatarNyjesh;

        return $this;
    }

    /**
     * Get nrMesatarNyjesh
     *
     * @return float 
     */
    public function getNrMesatarNyjesh()
    {
        return $this->nrMesatarNyjesh;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraLastareRinj
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
