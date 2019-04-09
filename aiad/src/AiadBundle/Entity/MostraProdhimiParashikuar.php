<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraProdhimiParashikuar
 *
 * @ORM\Table(name="mostra_prodhimi_parashikuar", indexes={@ORM\Index(name="fk_parcela_prodhim_parashikuar_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraProdhimiParashikuar
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
     * @ORM\Column(name="data_prodhimi_parashikuar", type="date", nullable=true)
     */
    private $dataProdhimiParashikuar;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_meslulezim_lastartotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioMeslulezimLastartotal;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_meslulezimfertil_lastartotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioMeslulezimfertilLastartotal;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_frutapararenies_lastaretotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioFrutaparareniesLastaretotal;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_frutapasrenies_lastaretotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioFrutapasreniesLastaretotal;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_frutaparareniesdyte_lastaretotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioFrutaparareniesdyteLastaretotal;

    /**
     * @var float
     *
     * @ORM\Column(name="pesha_mesatare_frutit", type="float", precision=10, scale=0, nullable=true)
     */
    private $peshaMesatareFrutit;

    /**
     * @var float
     *
     * @ORM\Column(name="parashikimi_prodhimit_ha", type="float", precision=10, scale=0, nullable=true)
     */
    private $parashikimiProdhimitHa;

    /**
     * @var float
     *
     * @ORM\Column(name="parashikimi_prodhimit_parcele", type="float", precision=10, scale=0, nullable=true)
     */
    private $parashikimiProdhimitParcele;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lulesh_fertile", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLuleshFertile;

    /**
     * @var float
     *
     * @ORM\Column(name="gjatesia_frutit", type="float", precision=10, scale=0, nullable=true)
     */
    private $gjatesiaFrutit;

    /**
     * @var float
     *
     * @ORM\Column(name="diametri_frutit", type="float", precision=10, scale=0, nullable=true)
     */
    private $diametriFrutit;

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
     * Set dataProdhimiParashikuar
     *
     * @param \DateTime $dataProdhimiParashikuar
     * @return MostraProdhimiParashikuar
     */
    public function setDataProdhimiParashikuar($dataProdhimiParashikuar)
    {
        $this->dataProdhimiParashikuar = $dataProdhimiParashikuar;

        return $this;
    }

    /**
     * Get dataProdhimiParashikuar
     *
     * @return \DateTime 
     */
    public function getDataProdhimiParashikuar()
    {
        return $this->dataProdhimiParashikuar;
    }

    /**
     * Set ratioMeslulezimLastartotal
     *
     * @param float $ratioMeslulezimLastartotal
     * @return MostraProdhimiParashikuar
     */
    public function setRatioMeslulezimLastartotal($ratioMeslulezimLastartotal)
    {
        $this->ratioMeslulezimLastartotal = $ratioMeslulezimLastartotal;

        return $this;
    }

    /**
     * Get ratioMeslulezimLastartotal
     *
     * @return float 
     */
    public function getRatioMeslulezimLastartotal()
    {
        return $this->ratioMeslulezimLastartotal;
    }

    /**
     * Set ratioMeslulezimfertilLastartotal
     *
     * @param float $ratioMeslulezimfertilLastartotal
     * @return MostraProdhimiParashikuar
     */
    public function setRatioMeslulezimfertilLastartotal($ratioMeslulezimfertilLastartotal)
    {
        $this->ratioMeslulezimfertilLastartotal = $ratioMeslulezimfertilLastartotal;

        return $this;
    }

    /**
     * Get ratioMeslulezimfertilLastartotal
     *
     * @return float 
     */
    public function getRatioMeslulezimfertilLastartotal()
    {
        return $this->ratioMeslulezimfertilLastartotal;
    }

    /**
     * Set ratioFrutaparareniesLastaretotal
     *
     * @param float $ratioFrutaparareniesLastaretotal
     * @return MostraProdhimiParashikuar
     */
    public function setRatioFrutaparareniesLastaretotal($ratioFrutaparareniesLastaretotal)
    {
        $this->ratioFrutaparareniesLastaretotal = $ratioFrutaparareniesLastaretotal;

        return $this;
    }

    /**
     * Get ratioFrutaparareniesLastaretotal
     *
     * @return float 
     */
    public function getRatioFrutaparareniesLastaretotal()
    {
        return $this->ratioFrutaparareniesLastaretotal;
    }

    /**
     * Set ratioFrutapasreniesLastaretotal
     *
     * @param float $ratioFrutapasreniesLastaretotal
     * @return MostraProdhimiParashikuar
     */
    public function setRatioFrutapasreniesLastaretotal($ratioFrutapasreniesLastaretotal)
    {
        $this->ratioFrutapasreniesLastaretotal = $ratioFrutapasreniesLastaretotal;

        return $this;
    }

    /**
     * Get ratioFrutapasreniesLastaretotal
     *
     * @return float 
     */
    public function getRatioFrutapasreniesLastaretotal()
    {
        return $this->ratioFrutapasreniesLastaretotal;
    }

    /**
     * Set ratioFrutaparareniesdyteLastaretotal
     *
     * @param float $ratioFrutaparareniesdyteLastaretotal
     * @return MostraProdhimiParashikuar
     */
    public function setRatioFrutaparareniesdyteLastaretotal($ratioFrutaparareniesdyteLastaretotal)
    {
        $this->ratioFrutaparareniesdyteLastaretotal = $ratioFrutaparareniesdyteLastaretotal;

        return $this;
    }

    /**
     * Get ratioFrutaparareniesdyteLastaretotal
     *
     * @return float 
     */
    public function getRatioFrutaparareniesdyteLastaretotal()
    {
        return $this->ratioFrutaparareniesdyteLastaretotal;
    }

    /**
     * Set peshaMesatareFrutit
     *
     * @param float $peshaMesatareFrutit
     * @return MostraProdhimiParashikuar
     */
    public function setPeshaMesatareFrutit($peshaMesatareFrutit)
    {
        $this->peshaMesatareFrutit = $peshaMesatareFrutit;

        return $this;
    }

    /**
     * Get peshaMesatareFrutit
     *
     * @return float 
     */
    public function getPeshaMesatareFrutit()
    {
        return $this->peshaMesatareFrutit;
    }

    /**
     * Set parashikimiProdhimitHa
     *
     * @param float $parashikimiProdhimitHa
     * @return MostraProdhimiParashikuar
     */
    public function setParashikimiProdhimitHa($parashikimiProdhimitHa)
    {
        $this->parashikimiProdhimitHa = $parashikimiProdhimitHa;

        return $this;
    }

    /**
     * Get parashikimiProdhimitHa
     *
     * @return float 
     */
    public function getParashikimiProdhimitHa()
    {
        return $this->parashikimiProdhimitHa;
    }

    /**
     * Set parashikimiProdhimitParcele
     *
     * @param float $parashikimiProdhimitParcele
     * @return MostraProdhimiParashikuar
     */
    public function setParashikimiProdhimitParcele($parashikimiProdhimitParcele)
    {
        $this->parashikimiProdhimitParcele = $parashikimiProdhimitParcele;

        return $this;
    }

    /**
     * Get parashikimiProdhimitParcele
     *
     * @return float 
     */
    public function getParashikimiProdhimitParcele()
    {
        return $this->parashikimiProdhimitParcele;
    }

    /**
     * Set perqindjeLuleshFertile
     *
     * @param float $perqindjeLuleshFertile
     * @return MostraProdhimiParashikuar
     */
    public function setPerqindjeLuleshFertile($perqindjeLuleshFertile)
    {
        $this->perqindjeLuleshFertile = $perqindjeLuleshFertile;

        return $this;
    }

    /**
     * Get perqindjeLuleshFertile
     *
     * @return float 
     */
    public function getPerqindjeLuleshFertile()
    {
        return $this->perqindjeLuleshFertile;
    }

    /**
     * Set gjatesiaFrutit
     *
     * @param float $gjatesiaFrutit
     * @return MostraProdhimiParashikuar
     */
    public function setGjatesiaFrutit($gjatesiaFrutit)
    {
        $this->gjatesiaFrutit = $gjatesiaFrutit;

        return $this;
    }

    /**
     * Get gjatesiaFrutit
     *
     * @return float 
     */
    public function getGjatesiaFrutit()
    {
        return $this->gjatesiaFrutit;
    }

    /**
     * Set diametriFrutit
     *
     * @param float $diametriFrutit
     * @return MostraProdhimiParashikuar
     */
    public function setDiametriFrutit($diametriFrutit)
    {
        $this->diametriFrutit = $diametriFrutit;

        return $this;
    }

    /**
     * Get diametriFrutit
     *
     * @return float 
     */
    public function getDiametriFrutit()
    {
        return $this->diametriFrutit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraProdhimiParashikuar
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
