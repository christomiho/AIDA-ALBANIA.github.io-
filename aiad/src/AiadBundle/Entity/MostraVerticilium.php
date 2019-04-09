<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraVerticilium
 *
 * @ORM\Table(name="mostra_verticilium", indexes={@ORM\Index(name="fk_parcela_verticulium_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraVerticilium
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
     * @ORM\Column(name="data_verticilium", type="date", nullable=true)
     */
    private $dataVerticilium;

    /**
     * @var float
     *
     * @ORM\Column(name="peme_simptoma_reja", type="float", precision=10, scale=0, nullable=true)
     */
    private $pemeSimptomaReja;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_pemeve_simptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjePemeveSimptoma;

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
     * Set dataVerticilium
     *
     * @param \DateTime $dataVerticilium
     * @return MostraVerticilium
     */
    public function setDataVerticilium($dataVerticilium)
    {
        $this->dataVerticilium = $dataVerticilium;

        return $this;
    }

    /**
     * Get dataVerticilium
     *
     * @return \DateTime 
     */
    public function getDataVerticilium()
    {
        return $this->dataVerticilium;
    }

    /**
     * Set pemeSimptomaReja
     *
     * @param float $pemeSimptomaReja
     * @return MostraVerticilium
     */
    public function setPemeSimptomaReja($pemeSimptomaReja)
    {
        $this->pemeSimptomaReja = $pemeSimptomaReja;

        return $this;
    }

    /**
     * Get pemeSimptomaReja
     *
     * @return float 
     */
    public function getPemeSimptomaReja()
    {
        return $this->pemeSimptomaReja;
    }

    /**
     * Set perqindjePemeveSimptoma
     *
     * @param float $perqindjePemeveSimptoma
     * @return MostraVerticilium
     */
    public function setPerqindjePemeveSimptoma($perqindjePemeveSimptoma)
    {
        $this->perqindjePemeveSimptoma = $perqindjePemeveSimptoma;

        return $this;
    }

    /**
     * Get perqindjePemeveSimptoma
     *
     * @return float 
     */
    public function getPerqindjePemeveSimptoma()
    {
        return $this->perqindjePemeveSimptoma;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraVerticilium
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
