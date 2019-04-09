<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraKocinija
 *
 * @ORM\Table(name="mostra_kocinija", indexes={@ORM\Index(name="fk_parcela_kocinija_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraKocinija
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
     * @ORM\Column(name="data_kocinija", type="date", nullable=true)
     */
    private $dataKocinija;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_adulttegjallejoparazite_lastar", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioAdulttegjallejoparaziteLastar;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_tegjallatotal_lastar", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioTegjallatotalLastar;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_vezetecelura", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeVezetecelura;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_territur_parazit", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeTerriturParazit;

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
     * Set dataKocinija
     *
     * @param \DateTime $dataKocinija
     * @return MostraKocinija
     */
    public function setDataKocinija($dataKocinija)
    {
        $this->dataKocinija = $dataKocinija;

        return $this;
    }

    /**
     * Get dataKocinija
     *
     * @return \DateTime 
     */
    public function getDataKocinija()
    {
        return $this->dataKocinija;
    }

    /**
     * Set ratioAdulttegjallejoparaziteLastar
     *
     * @param float $ratioAdulttegjallejoparaziteLastar
     * @return MostraKocinija
     */
    public function setRatioAdulttegjallejoparaziteLastar($ratioAdulttegjallejoparaziteLastar)
    {
        $this->ratioAdulttegjallejoparaziteLastar = $ratioAdulttegjallejoparaziteLastar;

        return $this;
    }

    /**
     * Get ratioAdulttegjallejoparaziteLastar
     *
     * @return float 
     */
    public function getRatioAdulttegjallejoparaziteLastar()
    {
        return $this->ratioAdulttegjallejoparaziteLastar;
    }

    /**
     * Set ratioTegjallatotalLastar
     *
     * @param float $ratioTegjallatotalLastar
     * @return MostraKocinija
     */
    public function setRatioTegjallatotalLastar($ratioTegjallatotalLastar)
    {
        $this->ratioTegjallatotalLastar = $ratioTegjallatotalLastar;

        return $this;
    }

    /**
     * Get ratioTegjallatotalLastar
     *
     * @return float 
     */
    public function getRatioTegjallatotalLastar()
    {
        return $this->ratioTegjallatotalLastar;
    }

    /**
     * Set perqindjeVezetecelura
     *
     * @param float $perqindjeVezetecelura
     * @return MostraKocinija
     */
    public function setPerqindjeVezetecelura($perqindjeVezetecelura)
    {
        $this->perqindjeVezetecelura = $perqindjeVezetecelura;

        return $this;
    }

    /**
     * Get perqindjeVezetecelura
     *
     * @return float 
     */
    public function getPerqindjeVezetecelura()
    {
        return $this->perqindjeVezetecelura;
    }

    /**
     * Set perqindjeTerriturParazit
     *
     * @param float $perqindjeTerriturParazit
     * @return MostraKocinija
     */
    public function setPerqindjeTerriturParazit($perqindjeTerriturParazit)
    {
        $this->perqindjeTerriturParazit = $perqindjeTerriturParazit;

        return $this;
    }

    /**
     * Get perqindjeTerriturParazit
     *
     * @return float 
     */
    public function getPerqindjeTerriturParazit()
    {
        return $this->perqindjeTerriturParazit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraKocinija
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
