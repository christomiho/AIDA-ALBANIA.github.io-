<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraNegrija
 *
 * @ORM\Table(name="mostra_negrija", indexes={@ORM\Index(name="fk_parcela_negrija_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraNegrija
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
     * @ORM\Column(name="data_negrija", type="date", nullable=true)
     */
    private $dataNegrija;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastarprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastarprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_mesatare_prekshmerise", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeMesatarePrekshmerise;

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
     * Set dataNegrija
     *
     * @param \DateTime $dataNegrija
     * @return MostraNegrija
     */
    public function setDataNegrija($dataNegrija)
    {
        $this->dataNegrija = $dataNegrija;

        return $this;
    }

    /**
     * Get dataNegrija
     *
     * @return \DateTime 
     */
    public function getDataNegrija()
    {
        return $this->dataNegrija;
    }

    /**
     * Set perqindjeLastarprekur
     *
     * @param float $perqindjeLastarprekur
     * @return MostraNegrija
     */
    public function setPerqindjeLastarprekur($perqindjeLastarprekur)
    {
        $this->perqindjeLastarprekur = $perqindjeLastarprekur;

        return $this;
    }

    /**
     * Get perqindjeLastarprekur
     *
     * @return float 
     */
    public function getPerqindjeLastarprekur()
    {
        return $this->perqindjeLastarprekur;
    }

    /**
     * Set perqindjeMesatarePrekshmerise
     *
     * @param float $perqindjeMesatarePrekshmerise
     * @return MostraNegrija
     */
    public function setPerqindjeMesatarePrekshmerise($perqindjeMesatarePrekshmerise)
    {
        $this->perqindjeMesatarePrekshmerise = $perqindjeMesatarePrekshmerise;

        return $this;
    }

    /**
     * Get perqindjeMesatarePrekshmerise
     *
     * @return float 
     */
    public function getPerqindjeMesatarePrekshmerise()
    {
        return $this->perqindjeMesatarePrekshmerise;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraNegrija
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
