<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraBarrenijo
 *
 * @ORM\Table(name="mostra_barrenijo", indexes={@ORM\Index(name="fk_parcela_barrenijo_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraBarrenijo
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
     * @ORM\Column(name="data_barrenijo", type="date", nullable=true)
     */
    private $dataBarrenijo;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_vrimahyrje_njesimostre", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioVrimahyrjeNjesimostre;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_vrimadalje_njesimostre", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioVrimadaljeNjesimostre;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastarprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastarprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_lastarprekur_formagjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioLastarprekurFormagjalla;

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
     * Set dataBarrenijo
     *
     * @param \DateTime $dataBarrenijo
     * @return MostraBarrenijo
     */
    public function setDataBarrenijo($dataBarrenijo)
    {
        $this->dataBarrenijo = $dataBarrenijo;

        return $this;
    }

    /**
     * Get dataBarrenijo
     *
     * @return \DateTime 
     */
    public function getDataBarrenijo()
    {
        return $this->dataBarrenijo;
    }

    /**
     * Set ratioVrimahyrjeNjesimostre
     *
     * @param float $ratioVrimahyrjeNjesimostre
     * @return MostraBarrenijo
     */
    public function setRatioVrimahyrjeNjesimostre($ratioVrimahyrjeNjesimostre)
    {
        $this->ratioVrimahyrjeNjesimostre = $ratioVrimahyrjeNjesimostre;

        return $this;
    }

    /**
     * Get ratioVrimahyrjeNjesimostre
     *
     * @return float 
     */
    public function getRatioVrimahyrjeNjesimostre()
    {
        return $this->ratioVrimahyrjeNjesimostre;
    }

    /**
     * Set ratioVrimadaljeNjesimostre
     *
     * @param float $ratioVrimadaljeNjesimostre
     * @return MostraBarrenijo
     */
    public function setRatioVrimadaljeNjesimostre($ratioVrimadaljeNjesimostre)
    {
        $this->ratioVrimadaljeNjesimostre = $ratioVrimadaljeNjesimostre;

        return $this;
    }

    /**
     * Get ratioVrimadaljeNjesimostre
     *
     * @return float 
     */
    public function getRatioVrimadaljeNjesimostre()
    {
        return $this->ratioVrimadaljeNjesimostre;
    }

    /**
     * Set perqindjeLastarprekur
     *
     * @param float $perqindjeLastarprekur
     * @return MostraBarrenijo
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
     * Set ratioLastarprekurFormagjalla
     *
     * @param float $ratioLastarprekurFormagjalla
     * @return MostraBarrenijo
     */
    public function setRatioLastarprekurFormagjalla($ratioLastarprekurFormagjalla)
    {
        $this->ratioLastarprekurFormagjalla = $ratioLastarprekurFormagjalla;

        return $this;
    }

    /**
     * Get ratioLastarprekurFormagjalla
     *
     * @return float 
     */
    public function getRatioLastarprekurFormagjalla()
    {
        return $this->ratioLastarprekurFormagjalla;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraBarrenijo
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
