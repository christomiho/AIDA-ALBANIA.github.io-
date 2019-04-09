<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraSyriPalloit
 *
 * @ORM\Table(name="mostra_syri_palloit", indexes={@ORM\Index(name="fk_parcela_syri_palloit_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraSyriPalloit
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
     * @ORM\Column(name="data_syri_palloit", type="date", nullable=true)
     */
    private $dataSyriPalloit;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastareinfektuar", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastareinfektuar;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_gjethe_infektuara", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeGjetheInfektuara;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_demtues_inkubuar_gjethe", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeDemtuesInkubuarGjethe;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_fleta_simptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFletaSimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="kushte_favorshme", type="float", precision=10, scale=0, nullable=true)
     */
    private $kushteFavorshme;

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
     * Set dataSyriPalloit
     *
     * @param \DateTime $dataSyriPalloit
     * @return MostraSyriPalloit
     */
    public function setDataSyriPalloit($dataSyriPalloit)
    {
        $this->dataSyriPalloit = $dataSyriPalloit;

        return $this;
    }

    /**
     * Get dataSyriPalloit
     *
     * @return \DateTime 
     */
    public function getDataSyriPalloit()
    {
        return $this->dataSyriPalloit;
    }

    /**
     * Set perqindjeLastareinfektuar
     *
     * @param float $perqindjeLastareinfektuar
     * @return MostraSyriPalloit
     */
    public function setPerqindjeLastareinfektuar($perqindjeLastareinfektuar)
    {
        $this->perqindjeLastareinfektuar = $perqindjeLastareinfektuar;

        return $this;
    }

    /**
     * Get perqindjeLastareinfektuar
     *
     * @return float 
     */
    public function getPerqindjeLastareinfektuar()
    {
        return $this->perqindjeLastareinfektuar;
    }

    /**
     * Set perqindjeGjetheInfektuara
     *
     * @param float $perqindjeGjetheInfektuara
     * @return MostraSyriPalloit
     */
    public function setPerqindjeGjetheInfektuara($perqindjeGjetheInfektuara)
    {
        $this->perqindjeGjetheInfektuara = $perqindjeGjetheInfektuara;

        return $this;
    }

    /**
     * Get perqindjeGjetheInfektuara
     *
     * @return float 
     */
    public function getPerqindjeGjetheInfektuara()
    {
        return $this->perqindjeGjetheInfektuara;
    }

    /**
     * Set perqindjeDemtuesInkubuarGjethe
     *
     * @param float $perqindjeDemtuesInkubuarGjethe
     * @return MostraSyriPalloit
     */
    public function setPerqindjeDemtuesInkubuarGjethe($perqindjeDemtuesInkubuarGjethe)
    {
        $this->perqindjeDemtuesInkubuarGjethe = $perqindjeDemtuesInkubuarGjethe;

        return $this;
    }

    /**
     * Get perqindjeDemtuesInkubuarGjethe
     *
     * @return float 
     */
    public function getPerqindjeDemtuesInkubuarGjethe()
    {
        return $this->perqindjeDemtuesInkubuarGjethe;
    }

    /**
     * Set perqindjeFletaSimptoma
     *
     * @param float $perqindjeFletaSimptoma
     * @return MostraSyriPalloit
     */
    public function setPerqindjeFletaSimptoma($perqindjeFletaSimptoma)
    {
        $this->perqindjeFletaSimptoma = $perqindjeFletaSimptoma;

        return $this;
    }

    /**
     * Get perqindjeFletaSimptoma
     *
     * @return float 
     */
    public function getPerqindjeFletaSimptoma()
    {
        return $this->perqindjeFletaSimptoma;
    }

    /**
     * Set kushteFavorshme
     *
     * @param float $kushteFavorshme
     * @return MostraSyriPalloit
     */
    public function setKushteFavorshme($kushteFavorshme)
    {
        $this->kushteFavorshme = $kushteFavorshme;

        return $this;
    }

    /**
     * Get kushteFavorshme
     *
     * @return float 
     */
    public function getKushteFavorshme()
    {
        return $this->kushteFavorshme;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraSyriPalloit
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
