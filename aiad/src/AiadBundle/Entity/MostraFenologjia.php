<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraFenologjia
 *
 * @ORM\Table(name="mostra_fenologjia", indexes={@ORM\Index(name="fk_parcela_fenologji_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraFenologjia
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
     * @ORM\Column(name="data_fenologjia", type="date", nullable=true)
     */
    private $dataFenologjia;

    /**
     * @var integer
     *
     * @ORM\Column(name="sythe_dimerore", type="integer", nullable=true)
     */
    private $sytheDimerore;

    /**
     * @var integer
     *
     * @ORM\Column(name="sythe_zhvillim", type="integer", nullable=true)
     */
    private $sytheZhvillim;

    /**
     * @var integer
     *
     * @ORM\Column(name="lulezimi", type="integer", nullable=true)
     */
    private $lulezimi;

    /**
     * @var integer
     *
     * @ORM\Column(name="lidhja_frutit", type="integer", nullable=true)
     */
    private $lidhjaFrutit;

    /**
     * @var integer
     *
     * @ORM\Column(name="ngjyre_jeshile", type="integer", nullable=true)
     */
    private $ngjyreJeshile;

    /**
     * @var integer
     *
     * @ORM\Column(name="ngjyre_verdhe", type="integer", nullable=true)
     */
    private $ngjyreVerdhe;

    /**
     * @var integer
     *
     * @ORM\Column(name="ngjyre_violet", type="integer", nullable=true)
     */
    private $ngjyreViolet;

    /**
     * @var integer
     *
     * @ORM\Column(name="ngjyre_zeze", type="integer", nullable=true)
     */
    private $ngjyreZeze;

    /**
     * @var integer
     *
     * @ORM\Column(name="frut_tejpjekur", type="integer", nullable=true)
     */
    private $frutTejpjekur;

    /**
     * @var float
     *
     * @ORM\Column(name="lulezimi_perqindje", type="float", nullable=true)
     */
    private $lulezimiPerqindje;

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
     * Set dataFenologjia
     *
     * @param \DateTime $dataFenologjia
     * @return MostraFenologjia
     */
    public function setDataFenologjia($dataFenologjia)
    {
        $this->dataFenologjia = $dataFenologjia;

        return $this;
    }

    /**
     * Get dataFenologjia
     *
     * @return \DateTime 
     */
    public function getDataFenologjia()
    {
        return $this->dataFenologjia;
    }

    /**
     * Set sytheDimerore
     *
     * @param integer $sytheDimerore
     * @return MostraFenologjia
     */
    public function setSytheDimerore($sytheDimerore)
    {
        $this->sytheDimerore = $sytheDimerore;

        return $this;
    }

    /**
     * Get sytheDimerore
     *
     * @return integer
     */
    public function getSytheDimerore()
    {
        return $this->sytheDimerore;
    }

    /**
     * Set sytheZhvillim
     *
     * @param integer $sytheZhvillim
     * @return MostraFenologjia
     */
    public function setSytheZhvillim($sytheZhvillim)
    {
        $this->sytheZhvillim = $sytheZhvillim;

        return $this;
    }

    /**
     * Get sytheZhvillim
     *
     * @return integer
     */
    public function getSytheZhvillim()
    {
        return $this->sytheZhvillim;
    }

    /**
     * Set lulezimi
     *
     * @param integer $lulezimi
     * @return MostraFenologjia
     */
    public function setLulezimi($lulezimi)
    {
        $this->lulezimi = $lulezimi;

        return $this;
    }

    /**
     * Get lulezimi
     *
     * @return integer
     */
    public function getLulezimi()
    {
        return $this->lulezimi;
    }

    /**
     * Set lidhjaFrutit
     *
     * @param integer $lidhjaFrutit
     * @return MostraFenologjia
     */
    public function setLidhjaFrutit($lidhjaFrutit)
    {
        $this->lidhjaFrutit = $lidhjaFrutit;

        return $this;
    }

    /**
     * Get lidhjaFrutit
     *
     * @return integer
     */
    public function getLidhjaFrutit()
    {
        return $this->lidhjaFrutit;
    }

    /**
     * Set ngjyreJeshile
     *
     * @param integer $ngjyreJeshile
     * @return MostraFenologjia
     */
    public function setNgjyreJeshile($ngjyreJeshile)
    {
        $this->ngjyreJeshile = $ngjyreJeshile;

        return $this;
    }

    /**
     * Get ngjyreJeshile
     *
     * @return integer
     */
    public function getNgjyreJeshile()
    {
        return $this->ngjyreJeshile;
    }

    /**
     * Set ngjyreVerdhe
     *
     * @param integer $ngjyreVerdhe
     * @return MostraFenologjia
     */
    public function setNgjyreVerdhe($ngjyreVerdhe)
    {
        $this->ngjyreVerdhe = $ngjyreVerdhe;

        return $this;
    }

    /**
     * Get ngjyreVerdhe
     *
     * @return integer
     */
    public function getNgjyreVerdhe()
    {
        return $this->ngjyreVerdhe;
    }

    /**
     * Set ngjyreViolet
     *
     * @param integer $ngjyreViolet
     * @return MostraFenologjia
     */
    public function setNgjyreViolet($ngjyreViolet)
    {
        $this->ngjyreViolet = $ngjyreViolet;

        return $this;
    }

    /**
     * Get ngjyreViolet
     *
     * @return integer
     */
    public function getNgjyreViolet()
    {
        return $this->ngjyreViolet;
    }

    /**
     * Set ngjyreZeze
     *
     * @param integer $ngjyreZeze
     * @return MostraFenologjia
     */
    public function setNgjyreZeze($ngjyreZeze)
    {
        $this->ngjyreZeze = $ngjyreZeze;

        return $this;
    }

    /**
     * Get ngjyreZeze
     *
     * @return integer
     */
    public function getNgjyreZeze()
    {
        return $this->ngjyreZeze;
    }

    /**
     * Set frutTejpjekur
     *
     * @param integer $frutTejpjekur
     * @return MostraFenologjia
     */
    public function setFrutTejpjekur($frutTejpjekur)
    {
        $this->frutTejpjekur = $frutTejpjekur;

        return $this;
    }

    /**
     * Get frutTejpjekur
     *
     * @return integer
     */
    public function getFrutTejpjekur()
    {
        return $this->frutTejpjekur;
    }

    /**
     * Set lulezimiPerqindje
     *
     * @param float $lulezimiPerqindje
     * @return MostraFenologjia
     */
    public function setLulezimiPerqindje($lulezimiPerqindje)
    {
        $this->lulezimiPerqindje = $lulezimiPerqindje;

        return $this;
    }

    /**
     * Get lulezimiPerqindje
     *
     * @return float
     */
    public function getLulezimiPerqindje()
    {
        return $this->lulezimiPerqindje;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraFenologjia
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
