<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraTjeraNdihmese
 *
 * @ORM\Table(name="mostra_tjera_ndihmese", indexes={@ORM\Index(name="fk_parcela_tjera_ndihmese_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraTjeraNdihmese
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
     * @ORM\Column(name="data_tjera_ndihmese", type="date", nullable=true)
     */
    private $dataTjeraNdihmese;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_skutelista_territurparazite", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeSkutelistaTerriturparazite;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_metafikus_kocinijaparazite", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeMetafikusKocinijaparazite;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_anthokoris_kocinijaparazite_njesimostre", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioAnthokorisKocinijaparaziteNjesimostre;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_ageniaspis_territur_grackedite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioAgeniaspisTerriturGrackedite;

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
     * Set dataTjeraNdihmese
     *
     * @param \DateTime $dataTjeraNdihmese
     * @return MostraTjeraNdihmese
     */
    public function setDataTjeraNdihmese($dataTjeraNdihmese)
    {
        $this->dataTjeraNdihmese = $dataTjeraNdihmese;

        return $this;
    }

    /**
     * Get dataTjeraNdihmese
     *
     * @return \DateTime 
     */
    public function getDataTjeraNdihmese()
    {
        return $this->dataTjeraNdihmese;
    }

    /**
     * Set perqindjeSkutelistaTerriturparazite
     *
     * @param float $perqindjeSkutelistaTerriturparazite
     * @return MostraTjeraNdihmese
     */
    public function setPerqindjeSkutelistaTerriturparazite($perqindjeSkutelistaTerriturparazite)
    {
        $this->perqindjeSkutelistaTerriturparazite = $perqindjeSkutelistaTerriturparazite;

        return $this;
    }

    /**
     * Get perqindjeSkutelistaTerriturparazite
     *
     * @return float 
     */
    public function getPerqindjeSkutelistaTerriturparazite()
    {
        return $this->perqindjeSkutelistaTerriturparazite;
    }

    /**
     * Set perqindjeMetafikusKocinijaparazite
     *
     * @param float $perqindjeMetafikusKocinijaparazite
     * @return MostraTjeraNdihmese
     */
    public function setPerqindjeMetafikusKocinijaparazite($perqindjeMetafikusKocinijaparazite)
    {
        $this->perqindjeMetafikusKocinijaparazite = $perqindjeMetafikusKocinijaparazite;

        return $this;
    }

    /**
     * Get perqindjeMetafikusKocinijaparazite
     *
     * @return float 
     */
    public function getPerqindjeMetafikusKocinijaparazite()
    {
        return $this->perqindjeMetafikusKocinijaparazite;
    }

    /**
     * Set ratioAnthokorisKocinijaparaziteNjesimostre
     *
     * @param float $ratioAnthokorisKocinijaparaziteNjesimostre
     * @return MostraTjeraNdihmese
     */
    public function setRatioAnthokorisKocinijaparaziteNjesimostre($ratioAnthokorisKocinijaparaziteNjesimostre)
    {
        $this->ratioAnthokorisKocinijaparaziteNjesimostre = $ratioAnthokorisKocinijaparaziteNjesimostre;

        return $this;
    }

    /**
     * Get ratioAnthokorisKocinijaparaziteNjesimostre
     *
     * @return float 
     */
    public function getRatioAnthokorisKocinijaparaziteNjesimostre()
    {
        return $this->ratioAnthokorisKocinijaparaziteNjesimostre;
    }

    /**
     * Set ratioAgeniaspisTerriturGrackedite
     *
     * @param float $ratioAgeniaspisTerriturGrackedite
     * @return MostraTjeraNdihmese
     */
    public function setRatioAgeniaspisTerriturGrackedite($ratioAgeniaspisTerriturGrackedite)
    {
        $this->ratioAgeniaspisTerriturGrackedite = $ratioAgeniaspisTerriturGrackedite;

        return $this;
    }

    /**
     * Get ratioAgeniaspisTerriturGrackedite
     *
     * @return float 
     */
    public function getRatioAgeniaspisTerriturGrackedite()
    {
        return $this->ratioAgeniaspisTerriturGrackedite;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraTjeraNdihmese
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
