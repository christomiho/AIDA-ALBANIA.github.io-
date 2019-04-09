<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraSemundjeTjera
 *
 * @ORM\Table(name="mostra_semundje_tjera", indexes={@ORM\Index(name="fk_parcela_semundje_tjera_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraSemundjeTjera
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
     * @ORM\Column(name="data_semundje_tjera", type="date", nullable=true)
     */
    private $dataSemundjeTjera;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_frutasapunifikuara_frutasimptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutasapunifikuaraFrutasimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_eskudete_frutasimptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeEskudeteFrutasimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lepra_frutasimptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLepraFrutasimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_frutakalbura_frutasimptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutakalburaFrutasimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="turbekuloza_simptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $turbekulozaSimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="asfiksia_rrenjeve_pemeinfektuara", type="float", precision=10, scale=0, nullable=true)
     */
    private $asfiksiaRrenjevePemeinfektuara;

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
     * Set dataSemundjeTjera
     *
     * @param \DateTime $dataSemundjeTjera
     * @return MostraSemundjeTjera
     */
    public function setDataSemundjeTjera($dataSemundjeTjera)
    {
        $this->dataSemundjeTjera = $dataSemundjeTjera;

        return $this;
    }

    /**
     * Get dataSemundjeTjera
     *
     * @return \DateTime 
     */
    public function getDataSemundjeTjera()
    {
        return $this->dataSemundjeTjera;
    }

    /**
     * Set perqindjeFrutasapunifikuaraFrutasimptoma
     *
     * @param float $perqindjeFrutasapunifikuaraFrutasimptoma
     * @return MostraSemundjeTjera
     */
    public function setPerqindjeFrutasapunifikuaraFrutasimptoma($perqindjeFrutasapunifikuaraFrutasimptoma)
    {
        $this->perqindjeFrutasapunifikuaraFrutasimptoma = $perqindjeFrutasapunifikuaraFrutasimptoma;

        return $this;
    }

    /**
     * Get perqindjeFrutasapunifikuaraFrutasimptoma
     *
     * @return float 
     */
    public function getPerqindjeFrutasapunifikuaraFrutasimptoma()
    {
        return $this->perqindjeFrutasapunifikuaraFrutasimptoma;
    }

    /**
     * Set perqindjeEskudeteFrutasimptoma
     *
     * @param float $perqindjeEskudeteFrutasimptoma
     * @return MostraSemundjeTjera
     */
    public function setPerqindjeEskudeteFrutasimptoma($perqindjeEskudeteFrutasimptoma)
    {
        $this->perqindjeEskudeteFrutasimptoma = $perqindjeEskudeteFrutasimptoma;

        return $this;
    }

    /**
     * Get perqindjeEskudeteFrutasimptoma
     *
     * @return float 
     */
    public function getPerqindjeEskudeteFrutasimptoma()
    {
        return $this->perqindjeEskudeteFrutasimptoma;
    }

    /**
     * Set perqindjeLepraFrutasimptoma
     *
     * @param float $perqindjeLepraFrutasimptoma
     * @return MostraSemundjeTjera
     */
    public function setPerqindjeLepraFrutasimptoma($perqindjeLepraFrutasimptoma)
    {
        $this->perqindjeLepraFrutasimptoma = $perqindjeLepraFrutasimptoma;

        return $this;
    }

    /**
     * Get perqindjeLepraFrutasimptoma
     *
     * @return float 
     */
    public function getPerqindjeLepraFrutasimptoma()
    {
        return $this->perqindjeLepraFrutasimptoma;
    }

    /**
     * Set perqindjeFrutakalburaFrutasimptoma
     *
     * @param float $perqindjeFrutakalburaFrutasimptoma
     * @return MostraSemundjeTjera
     */
    public function setPerqindjeFrutakalburaFrutasimptoma($perqindjeFrutakalburaFrutasimptoma)
    {
        $this->perqindjeFrutakalburaFrutasimptoma = $perqindjeFrutakalburaFrutasimptoma;

        return $this;
    }

    /**
     * Get perqindjeFrutakalburaFrutasimptoma
     *
     * @return float 
     */
    public function getPerqindjeFrutakalburaFrutasimptoma()
    {
        return $this->perqindjeFrutakalburaFrutasimptoma;
    }

    /**
     * Set turbekulozaSimptoma
     *
     * @param float $turbekulozaSimptoma
     * @return MostraSemundjeTjera
     */
    public function setTurbekulozaSimptoma($turbekulozaSimptoma)
    {
        $this->turbekulozaSimptoma = $turbekulozaSimptoma;

        return $this;
    }

    /**
     * Get turbekulozaSimptoma
     *
     * @return float 
     */
    public function getTurbekulozaSimptoma()
    {
        return $this->turbekulozaSimptoma;
    }

    /**
     * Set asfiksiaRrenjevePemeinfektuara
     *
     * @param float $asfiksiaRrenjevePemeinfektuara
     * @return MostraSemundjeTjera
     */
    public function setAsfiksiaRrenjevePemeinfektuara($asfiksiaRrenjevePemeinfektuara)
    {
        $this->asfiksiaRrenjevePemeinfektuara = $asfiksiaRrenjevePemeinfektuara;

        return $this;
    }

    /**
     * Get asfiksiaRrenjevePemeinfektuara
     *
     * @return float 
     */
    public function getAsfiksiaRrenjevePemeinfektuara()
    {
        return $this->asfiksiaRrenjevePemeinfektuara;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraSemundjeTjera
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
