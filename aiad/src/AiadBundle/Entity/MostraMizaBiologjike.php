<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraMizaBiologjike
 *
 * @ORM\Table(name="mostra_miza_biologjike", indexes={@ORM\Index(name="fk_parcela_miza_biologjike_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraMizaBiologjike
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
     * @ORM\Column(name="data_miza_biologjike", type="date", nullable=true)
     */
    private $dataMizaBiologjike;

    /**
     * @var float
     *
     * @ORM\Column(name="fruta_vezhguara", type="float", precision=10, scale=0, nullable=true)
     */
    private $frutaVezhguara;

    /**
     * @var float
     *
     * @ORM\Column(name="fruta_pickuara", type="float", precision=10, scale=0, nullable=true)
     */
    private $frutaPickuara;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_pickimepaveze", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioPickimepaveze;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_vezetegjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioVezetegjalla;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_vezetevdekura", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioVezetevdekura;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_larvategjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioLarvategjalla;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_larvatengordhura", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioLarvatengordhura;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_nimfategjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioNimfategjalla;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_nimfatengordhura", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioNimfatengordhura;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_galeribosh", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioGaleribosh;

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
     * Set dataMizaBiologjike
     *
     * @param \DateTime $dataMizaBiologjike
     * @return MostraMizaBiologjike
     */
    public function setDataMizaBiologjike($dataMizaBiologjike)
    {
        $this->dataMizaBiologjike = $dataMizaBiologjike;

        return $this;
    }

    /**
     * Get dataMizaBiologjike
     *
     * @return \DateTime 
     */
    public function getDataMizaBiologjike()
    {
        return $this->dataMizaBiologjike;
    }

    /**
     * Set frutaVezhguara
     *
     * @param float $frutaVezhguara
     * @return MostraMizaBiologjike
     */
    public function setFrutaVezhguara($frutaVezhguara)
    {
        $this->frutaVezhguara = $frutaVezhguara;

        return $this;
    }

    /**
     * Get frutaVezhguara
     *
     * @return float 
     */
    public function getFrutaVezhguara()
    {
        return $this->frutaVezhguara;
    }

    /**
     * Set frutaPickuara
     *
     * @param float $frutaPickuara
     * @return MostraMizaBiologjike
     */
    public function setFrutaPickuara($frutaPickuara)
    {
        $this->frutaPickuara = $frutaPickuara;

        return $this;
    }

    /**
     * Get frutaPickuara
     *
     * @return float 
     */
    public function getFrutaPickuara()
    {
        return $this->frutaPickuara;
    }

    /**
     * Set ratioPickimepaveze
     *
     * @param float $ratioPickimepaveze
     * @return MostraMizaBiologjike
     */
    public function setRatioPickimepaveze($ratioPickimepaveze)
    {
        $this->ratioPickimepaveze = $ratioPickimepaveze;

        return $this;
    }

    /**
     * Get ratioPickimepaveze
     *
     * @return float 
     */
    public function getRatioPickimepaveze()
    {
        return $this->ratioPickimepaveze;
    }

    /**
     * Set ratioVezetegjalla
     *
     * @param float $ratioVezetegjalla
     * @return MostraMizaBiologjike
     */
    public function setRatioVezetegjalla($ratioVezetegjalla)
    {
        $this->ratioVezetegjalla = $ratioVezetegjalla;

        return $this;
    }

    /**
     * Get ratioVezetegjalla
     *
     * @return float 
     */
    public function getRatioVezetegjalla()
    {
        return $this->ratioVezetegjalla;
    }

    /**
     * Set ratioVezetevdekura
     *
     * @param float $ratioVezetevdekura
     * @return MostraMizaBiologjike
     */
    public function setRatioVezetevdekura($ratioVezetevdekura)
    {
        $this->ratioVezetevdekura = $ratioVezetevdekura;

        return $this;
    }

    /**
     * Get ratioVezetevdekura
     *
     * @return float 
     */
    public function getRatioVezetevdekura()
    {
        return $this->ratioVezetevdekura;
    }

    /**
     * Set ratioLarvategjalla
     *
     * @param float $ratioLarvategjalla
     * @return MostraMizaBiologjike
     */
    public function setRatioLarvategjalla($ratioLarvategjalla)
    {
        $this->ratioLarvategjalla = $ratioLarvategjalla;

        return $this;
    }

    /**
     * Get ratioLarvategjalla
     *
     * @return float 
     */
    public function getRatioLarvategjalla()
    {
        return $this->ratioLarvategjalla;
    }

    /**
     * Set ratioLarvatengordhura
     *
     * @param float $ratioLarvatengordhura
     * @return MostraMizaBiologjike
     */
    public function setRatioLarvatengordhura($ratioLarvatengordhura)
    {
        $this->ratioLarvatengordhura = $ratioLarvatengordhura;

        return $this;
    }

    /**
     * Get ratioLarvatengordhura
     *
     * @return float 
     */
    public function getRatioLarvatengordhura()
    {
        return $this->ratioLarvatengordhura;
    }

    /**
     * Set ratioNimfategjalla
     *
     * @param float $ratioNimfategjalla
     * @return MostraMizaBiologjike
     */
    public function setRatioNimfategjalla($ratioNimfategjalla)
    {
        $this->ratioNimfategjalla = $ratioNimfategjalla;

        return $this;
    }

    /**
     * Get ratioNimfategjalla
     *
     * @return float 
     */
    public function getRatioNimfategjalla()
    {
        return $this->ratioNimfategjalla;
    }

    /**
     * Set ratioNimfatengordhura
     *
     * @param float $ratioNimfatengordhura
     * @return MostraMizaBiologjike
     */
    public function setRatioNimfatengordhura($ratioNimfatengordhura)
    {
        $this->ratioNimfatengordhura = $ratioNimfatengordhura;

        return $this;
    }

    /**
     * Get ratioNimfatengordhura
     *
     * @return float 
     */
    public function getRatioNimfatengordhura()
    {
        return $this->ratioNimfatengordhura;
    }

    /**
     * Set ratioGaleribosh
     *
     * @param float $ratioGaleribosh
     * @return MostraMizaBiologjike
     */
    public function setRatioGaleribosh($ratioGaleribosh)
    {
        $this->ratioGaleribosh = $ratioGaleribosh;

        return $this;
    }

    /**
     * Get ratioGaleribosh
     *
     * @return float 
     */
    public function getRatioGaleribosh()
    {
        return $this->ratioGaleribosh;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraMizaBiologjike
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
