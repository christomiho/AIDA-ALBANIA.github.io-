<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TabelaPermbledheseAplikimSemundjesh
 *
 * @ORM\Table(name="tabela_permbledhese_aplikim_semundjesh", indexes={@ORM\Index(name="fk_parcela_perkatese_idx", columns={"parcela"}), @ORM\Index(name="fk_shperndarja_trajtimit_idx", columns={"shperndarja_trajtimit"})})
 * @ORM\Entity
 */
class TabelaPermbledheseAplikimSemundjesh
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
     * @ORM\Column(name="data_trajnimit", type="date", nullable=true)
     */
    private $dataTrajnimit;

    /**
     * @var integer
     *
     * @ORM\Column(name="numri_aplikimit", type="integer", nullable=true)
     */
    private $numriAplikimit;

    /**
     * @var float
     *
     * @ORM\Column(name="sasia_trajtimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $sasiaTrajtimit;

    /**
     * @var \SettingsShperndarjaTrajtimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsShperndarjaTrajtimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shperndarja_trajtimit", referencedColumnName="id")
     * })
     */
    private $shperndarjaTrajtimit;

    /**
     * @var float
     *
     * @ORM\Column(name="siperfaqja_trajtuar_hektar", type="float", precision=10, scale=0, nullable=true)
     */
    private $siperfaqjaTrajtuarHektar;

    /**
     * @var float
     *
     * @ORM\Column(name="siperfaqja_trajtuar_perqindje", type="float", precision=10, scale=0, nullable=true)
     */
    private $siperfaqjaTrajtuarPerqindje;

    /**
     * @var float
     *
     * @ORM\Column(name="presioni_trajtimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $presioniTrajtimit;

    /**
     * @var float
     *
     * @ORM\Column(name="shpejtesia_trajtimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $shpejtesiaTrajtimit;

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
     * Set dataTrajnimit
     *
     * @param \DateTime $dataTrajnimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setDataTrajnimit($dataTrajnimit)
    {
        $this->dataTrajnimit = $dataTrajnimit;

        return $this;
    }

    /**
     * Get dataTrajnimit
     *
     * @return \DateTime 
     */
    public function getDataTrajnimit()
    {
        return $this->dataTrajnimit;
    }

    /**
     * Set numriAplikimit
     *
     * @param integer $numriAplikimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setNumriAplikimit($numriAplikimit)
    {
        $this->numriAplikimit = $numriAplikimit;

        return $this;
    }

    /**
     * Get numriAplikimit
     *
     * @return integer 
     */
    public function getNumriAplikimit()
    {
        return $this->numriAplikimit;
    }

    /**
     * Set sasiaTrajtimit
     *
     * @param float $sasiaTrajtimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setSasiaTrajtimit($sasiaTrajtimit)
    {
        $this->sasiaTrajtimit = $sasiaTrajtimit;

        return $this;
    }

    /**
     * Get sasiaTrajtimit
     *
     * @return float 
     */
    public function getSasiaTrajtimit()
    {
        return $this->sasiaTrajtimit;
    }

    /**
     * Set shperndarjaTrajtimit
     *
     * @param \AiadBundle\Entity\SettingsShperndarjaTrajtimit $shperndarjaTrajtimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setShperndarjaTrajtimit(\AiadBundle\Entity\SettingsShperndarjaTrajtimit $shperndarjaTrajtimit = null)
    {
        $this->shperndarjaTrajtimit = $shperndarjaTrajtimit;

        return $this;
    }

    /**
     * Get shperndarjaTrajtimit
     *
     * @return \AiadBundle\Entity\SettingsShperndarjaTrajtimit
     */
    public function getShperndarjaTrajtimit()
    {
        return $this->shperndarjaTrajtimit;
    }


    /**
     * Set siperfaqjaTrajtuarHektar
     *
     * @param float $siperfaqjaTrajtuarHektar
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setSiperfaqjaTrajtuarHektar($siperfaqjaTrajtuarHektar)
    {
        $this->siperfaqjaTrajtuarHektar = $siperfaqjaTrajtuarHektar;

        return $this;
    }

    /**
     * Get siperfaqjaTrajtuarHektar
     *
     * @return float 
     */
    public function getSiperfaqjaTrajtuarHektar()
    {
        return $this->siperfaqjaTrajtuarHektar;
    }

    /**
     * Set siperfaqjaTrajtuarPerqindje
     *
     * @param float $siperfaqjaTrajtuarPerqindje
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setSiperfaqjaTrajtuarPerqindje($siperfaqjaTrajtuarPerqindje)
    {
        $this->siperfaqjaTrajtuarPerqindje = $siperfaqjaTrajtuarPerqindje;

        return $this;
    }

    /**
     * Get siperfaqjaTrajtuarPerqindje
     *
     * @return float 
     */
    public function getSiperfaqjaTrajtuarPerqindje()
    {
        return $this->siperfaqjaTrajtuarPerqindje;
    }

    /**
     * Set presioniTrajtimit
     *
     * @param float $presioniTrajtimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setPresioniTrajtimit($presioniTrajtimit)
    {
        $this->presioniTrajtimit = $presioniTrajtimit;

        return $this;
    }

    /**
     * Get presioniTrajtimit
     *
     * @return float 
     */
    public function getPresioniTrajtimit()
    {
        return $this->presioniTrajtimit;
    }

    /**
     * Set shpejtesiaTrajtimit
     *
     * @param float $shpejtesiaTrajtimit
     * @return TabelaPermbledheseAplikimSemundjesh
     */
    public function setShpejtesiaTrajtimit($shpejtesiaTrajtimit)
    {
        $this->shpejtesiaTrajtimit = $shpejtesiaTrajtimit;

        return $this;
    }

    /**
     * Get shpejtesiaTrajtimit
     *
     * @return float 
     */
    public function getShpejtesiaTrajtimit()
    {
        return $this->shpejtesiaTrajtimit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return TabelaPermbledheseAplikimSemundjesh
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
