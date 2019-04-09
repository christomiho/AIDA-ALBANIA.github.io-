<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AplikimePleherimi
 *
 * @ORM\Table(name="aplikime_pleherimi", indexes={@ORM\Index(name="fk_tipi_aplikimit_pleherim_idx", columns={"tipi_aplikimit"}), @ORM\Index(name="fk_modeli_aplikimit_idx", columns={"modeli_aplikimit"}), @ORM\Index(name="fk_produkti_komercial_idx", columns={"produkti_komercial_pleherimit"}),@ORM\Index(name="fk_pleherimi_njesia_idx", columns={"njesia_aplikimit"}), @ORM\Index(name="fk_justifikimi_pleherimit_idx", columns={"justifikimi_aplikimit"}), @ORM\Index(name="fk_parcela_pleherimi_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class AplikimePleherimi
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
     * @ORM\Column(name="data_aplikimit", type="date", nullable=true)
     */
    private $dataAplikimit;

    /**
     * @var float
     *
     * @ORM\Column(name="siperfaqja_aplikimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $siperfaqjaAplikimit;

    /**
     * @var string
     *
     * @ORM\Column(name="lenda_aktive", type="string", length=100, nullable=true)
     */
    private $lendaAktive;

    /**
     * @var float
     *
     * @ORM\Column(name="doza_aplikimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $dozaAplikimit;

    /**
     * @var \SettingsDozaNjesia
     *
     * @ORM\ManyToOne(targetEntity="SettingsDozaNjesia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="njesia_aplikimit", referencedColumnName="id")
     * })
     */
    private $njesiaAplikimit;

    /**
     * @var float
     *
     * @ORM\Column(name="nitrat", type="float", precision=10, scale=0, nullable=true)
     */
    private $nitrat;

    /**
     * @var float
     *
     * @ORM\Column(name="fosfor", type="float", precision=10, scale=0, nullable=true)
     */
    private $fosfor;

    /**
     * @var float
     *
     * @ORM\Column(name="potasium", type="float", precision=10, scale=0, nullable=true)
     */
    private $potasium;

    /**
     * @var float
     *
     * @ORM\Column(name="nitrat_uf", type="float", precision=10, scale=0, nullable=true)
     */
    private $nitratUf;

    /**
     * @var float
     *
     * @ORM\Column(name="fosfor_uf", type="float", precision=10, scale=0, nullable=true)
     */
    private $fosforUf;

    /**
     * @var float
     *
     * @ORM\Column(name="potasium_uf", type="float", precision=10, scale=0, nullable=true)
     */
    private $potasiumUf;

    /**
     * @var float
     *
     * @ORM\Column(name="calcium", type="float", precision=10, scale=0, nullable=true)
     */
    private $calcium;

    /**
     * @var float
     *
     * @ORM\Column(name="magnez", type="float", precision=10, scale=0, nullable=true)
     */
    private $magnez;

    /**
     * @var float
     *
     * @ORM\Column(name="squfur", type="float", precision=10, scale=0, nullable=true)
     */
    private $squfur;

    /**
     * @var float
     *
     * @ORM\Column(name="hekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $hekur;

    /**
     * @var float
     *
     * @ORM\Column(name="zink", type="float", precision=10, scale=0, nullable=true)
     */
    private $zink;

    /**
     * @var float
     *
     * @ORM\Column(name="mangan", type="float", precision=10, scale=0, nullable=true)
     */
    private $mangan;

    /**
     * @var float
     *
     * @ORM\Column(name="molibdenum", type="float", precision=10, scale=0, nullable=true)
     */
    private $molibdenum;

    /**
     * @var float
     *
     * @ORM\Column(name="bor", type="float", precision=10, scale=0, nullable=true)
     */
    private $bor;

    /**
     * @var float
     *
     * @ORM\Column(name="klor", type="float", precision=10, scale=0, nullable=true)
     */
    private $klor;

    /**
     * @var float
     *
     * @ORM\Column(name="baker", type="float", precision=10, scale=0, nullable=true)
     */
    private $baker;

    /**
     * @var integer
     *
     * @ORM\Column(name="firma_shperndarese", type="integer", nullable=true)
     */
    private $firmaShperndarese;

    /**
     * @var float
     *
     * @ORM\Column(name="densiteti_pleherimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $densitetiPleherimit;

    /**
     * @var float
     *
     * @ORM\Column(name="aplikime_pleherim_ujitje", type="float", precision=10, scale=0, nullable=true)
     */
    private $aplikimePleherimUjitje;

    /**
     * @var float
     *
     * @ORM\Column(name="aplikime_pleherimi_aplikuar", type="float", precision=10, scale=0, nullable=true)
     */
    private $aplikimePleherimiAplikuar;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=300, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsPleherimiTipi
     *
     * @ORM\ManyToOne(targetEntity="SettingsPleherimiTipi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi_aplikimit", referencedColumnName="id")
     * })
     */
    private $tipiAplikimit;

    /**
     * @var \SettingsModeliPleherimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsModeliPleherimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modeli_aplikimit", referencedColumnName="id")
     * })
     */
    private $modeliAplikimit;

    /**
     * @var \SettingsProduktiKomercial
     *
     * @ORM\ManyToOne(targetEntity="SettingsProduktiKomercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produkti_komercial_pleherimit", referencedColumnName="id")
     * })
     */
    private $produktiKomercialPleherimit;

    /**
     * @var \SettingsPleherimiJustifikim
     *
     * @ORM\ManyToOne(targetEntity="SettingsPleherimiJustifikim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="justifikimi_aplikimit", referencedColumnName="id")
     * })
     */
    private $justifikimiAplikimit;

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
     * Set dataAplikimit
     *
     * @param \DateTime $dataAplikimit
     * @return AplikimePleherimi
     */
    public function setDataAplikimit($dataAplikimit)
    {
        $this->dataAplikimit = $dataAplikimit;

        return $this;
    }

    /**
     * Get dataAplikimit
     *
     * @return \DateTime 
     */
    public function getDataAplikimit()
    {
        return $this->dataAplikimit;
    }

    /**
     * Set siperfaqjaAplikimit
     *
     * @param float $siperfaqjaAplikimit
     * @return AplikimePleherimi
     */
    public function setSiperfaqjaAplikimit($siperfaqjaAplikimit)
    {
        $this->siperfaqjaAplikimit = $siperfaqjaAplikimit;

        return $this;
    }

    /**
     * Get siperfaqjaAplikimit
     *
     * @return float 
     */
    public function getSiperfaqjaAplikimit()
    {
        return $this->siperfaqjaAplikimit;
    }

    /**
     * Set lendaAktive
     *
     * @param string $lendaAktive
     * @return AplikimePleherimi
     */
    public function setLendaAktive($lendaAktive)
    {
        $this->lendaAktive = $lendaAktive;

        return $this;
    }

    /**
     * Get lendaAktive
     *
     * @return string 
     */
    public function getLendaAktive()
    {
        return $this->lendaAktive;
    }

    /**
     * Set dozaAplikimit
     *
     * @param float $dozaAplikimit
     * @return AplikimePleherimi
     */
    public function setDozaAplikimit($dozaAplikimit)
    {
        $this->dozaAplikimit = $dozaAplikimit;

        return $this;
    }

    /**
     * Get dozaAplikimit
     *
     * @return float 
     */
    public function getDozaAplikimit()
    {
        return $this->dozaAplikimit;
    }

    /**
     * Set njesiaAplikimit
     *
     * @param \AiadBundle\Entity\SettingsDozaNjesia $njesiaAplikimit
     * @return AplikimePleherimi
     */
    public function setNjesiaAplikimit(\AiadBundle\Entity\SettingsDozaNjesia $njesiaAplikimit = null)
    {
        $this->njesiaAplikimit = $njesiaAplikimit;

        return $this;
    }

    /**
     * Get njesiaAplikimit
     *
     * @return \AiadBundle\Entity\SettingsDozaNjesia
     */
    public function getNjesiaAplikimit()
    {
        return $this->njesiaAplikimit;
    }


    /**
     * Set nitrat
     *
     * @param float $nitrat
     * @return AplikimePleherimi
     */
    public function setNitrat($nitrat)
    {
        $this->nitrat = $nitrat;

        return $this;
    }

    /**
     * Get nitrat
     *
     * @return float 
     */
    public function getNitrat()
    {
        return $this->nitrat;
    }

    /**
     * Set fosfor
     *
     * @param float $fosfor
     * @return AplikimePleherimi
     */
    public function setFosfor($fosfor)
    {
        $this->fosfor = $fosfor;

        return $this;
    }

    /**
     * Get fosfor
     *
     * @return float 
     */
    public function getFosfor()
    {
        return $this->fosfor;
    }

    /**
     * Set potasium
     *
     * @param float $potasium
     * @return AplikimePleherimi
     */
    public function setPotasium($potasium)
    {
        $this->potasium = $potasium;

        return $this;
    }

    /**
     * Get potasium
     *
     * @return float 
     */
    public function getPotasium()
    {
        return $this->potasium;
    }

    /**
     * Set nitratUf
     *
     * @param float $nitratUf
     * @return AplikimePleherimi
     */
    public function setNitratUf($nitratUf)
    {
        $this->nitratUf = $nitratUf;

        return $this;
    }

    /**
     * Get nitratUf
     *
     * @return float 
     */
    public function getNitratUf()
    {
        return $this->nitratUf;
    }

    /**
     * Set fosforUf
     *
     * @param float $fosforUf
     * @return AplikimePleherimi
     */
    public function setFosforUf($fosforUf)
    {
        $this->fosforUf = $fosforUf;

        return $this;
    }

    /**
     * Get fosforUf
     *
     * @return float 
     */
    public function getFosforUf()
    {
        return $this->fosforUf;
    }

    /**
     * Set potasiumUf
     *
     * @param float $potasiumUf
     * @return AplikimePleherimi
     */
    public function setPotasiumUf($potasiumUf)
    {
        $this->potasiumUf = $potasiumUf;

        return $this;
    }

    /**
     * Get potasiumUf
     *
     * @return float 
     */
    public function getPotasiumUf()
    {
        return $this->potasiumUf;
    }

    /**
     * Set calcium
     *
     * @param float $calcium
     * @return AplikimePleherimi
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;

        return $this;
    }

    /**
     * Get calcium
     *
     * @return float 
     */
    public function getCalcium()
    {
        return $this->calcium;
    }

    /**
     * Set magnez
     *
     * @param float $magnez
     * @return AplikimePleherimi
     */
    public function setMagnez($magnez)
    {
        $this->magnez = $magnez;

        return $this;
    }

    /**
     * Get magnez
     *
     * @return float 
     */
    public function getMagnez()
    {
        return $this->magnez;
    }

    /**
     * Set squfur
     *
     * @param float $squfur
     * @return AplikimePleherimi
     */
    public function setSqufur($squfur)
    {
        $this->squfur = $squfur;

        return $this;
    }

    /**
     * Get squfur
     *
     * @return float 
     */
    public function getSqufur()
    {
        return $this->squfur;
    }

    /**
     * Set hekur
     *
     * @param float $hekur
     * @return AplikimePleherimi
     */
    public function setHekur($hekur)
    {
        $this->hekur = $hekur;

        return $this;
    }

    /**
     * Get hekur
     *
     * @return float 
     */
    public function getHekur()
    {
        return $this->hekur;
    }

    /**
     * Set zink
     *
     * @param float $zink
     * @return AplikimePleherimi
     */
    public function setZink($zink)
    {
        $this->zink = $zink;

        return $this;
    }

    /**
     * Get zink
     *
     * @return float 
     */
    public function getZink()
    {
        return $this->zink;
    }

    /**
     * Set mangan
     *
     * @param float $mangan
     * @return AplikimePleherimi
     */
    public function setMangan($mangan)
    {
        $this->mangan = $mangan;

        return $this;
    }

    /**
     * Get mangan
     *
     * @return float 
     */
    public function getMangan()
    {
        return $this->mangan;
    }

    /**
     * Set molibdenum
     *
     * @param float $molibdenum
     * @return AplikimePleherimi
     */
    public function setMolibdenum($molibdenum)
    {
        $this->molibdenum = $molibdenum;

        return $this;
    }

    /**
     * Get molibdenum
     *
     * @return float 
     */
    public function getMolibdenum()
    {
        return $this->molibdenum;
    }

    /**
     * Set bor
     *
     * @param float $bor
     * @return AplikimePleherimi
     */
    public function setBor($bor)
    {
        $this->bor = $bor;

        return $this;
    }

    /**
     * Get bor
     *
     * @return float 
     */
    public function getBor()
    {
        return $this->bor;
    }

    /**
     * Set klor
     *
     * @param float $klor
     * @return AplikimePleherimi
     */
    public function setKlor($klor)
    {
        $this->klor = $klor;

        return $this;
    }

    /**
     * Get klor
     *
     * @return float 
     */
    public function getKlor()
    {
        return $this->klor;
    }


    /**
     * Set baker
     *
     * @param float $baker
     * @return AplikimePleherimi
     */
    public function setBaker($baker)
    {
        $this->baker = $baker;

        return $this;
    }

    /**
     * Get baker
     *
     * @return float
     */
    public function getBaker()
    {
        return $this->baker;
    }


    /**
     * Set firmaShperndarese
     *
     * @param integer $firmaShperndarese
     * @return AplikimePleherimi
     */
    public function setFirmaShperndarese($firmaShperndarese)
    {
        $this->firmaShperndarese = $firmaShperndarese;

        return $this;
    }

    /**
     * Get firmaShperndarese
     *
     * @return integer 
     */
    public function getFirmaShperndarese()
    {
        return $this->firmaShperndarese;
    }

    /**
     * Set densitetiPleherimit
     *
     * @param float $densitetiPleherimit
     * @return AplikimePleherimi
     */
    public function setDensitetiPleherimit($densitetiPleherimit)
    {
        $this->densitetiPleherimit = $densitetiPleherimit;

        return $this;
    }

    /**
     * Get densitetiPleherimit
     *
     * @return float 
     */
    public function getDensitetiPleherimit()
    {
        return $this->densitetiPleherimit;
    }

    /**
     * Set aplikimePleherimUjitje
     *
     * @param float $aplikimePleherimUjitje
     * @return AplikimePleherimi
     */
    public function setAplikimePleherimUjitje($aplikimePleherimUjitje)
    {
        $this->aplikimePleherimUjitje = $aplikimePleherimUjitje;

        return $this;
    }

    /**
     * Get aplikimePleherimUjitje
     *
     * @return float 
     */
    public function getAplikimePleherimUjitje()
    {
        return $this->aplikimePleherimUjitje;
    }

    /**
     * Set aplikimePleherimiAplikuar
     *
     * @param float $aplikimePleherimiAplikuar
     * @return AplikimePleherimi
     */
    public function setAplikimePleherimiAplikuar($aplikimePleherimiAplikuar)
    {
        $this->aplikimePleherimiAplikuar = $aplikimePleherimiAplikuar;

        return $this;
    }

    /**
     * Get aplikimePleherimiAplikuar
     *
     * @return float 
     */
    public function getAplikimePleherimiAplikuar()
    {
        return $this->aplikimePleherimiAplikuar;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return AplikimePleherimi
     */
    public function setVezhgime($vezhgime)
    {
        $this->vezhgime = $vezhgime;

        return $this;
    }

    /**
     * Get vezhgime
     *
     * @return string 
     */
    public function getVezhgime()
    {
        return $this->vezhgime;
    }

    /**
     * Set tipiAplikimit
     *
     * @param \AiadBundle\Entity\SettingsPleherimiTipi $tipiAplikimit
     * @return AplikimePleherimi
     */
    public function setTipiAplikimit(\AiadBundle\Entity\SettingsPleherimiTipi $tipiAplikimit = null)
    {
        $this->tipiAplikimit = $tipiAplikimit;

        return $this;
    }

    /**
     * Get tipiAplikimit
     *
     * @return \AiadBundle\Entity\SettingsPleherimiTipi 
     */
    public function getTipiAplikimit()
    {
        return $this->tipiAplikimit;
    }

    /**
     * Set modeliAplikimit
     *
     * @param \AiadBundle\Entity\SettingsModeliPleherimit $modeliAplikimit
     * @return AplikimePleherimi
     */
    public function setModeliAplikimit(\AiadBundle\Entity\SettingsModeliPleherimit $modeliAplikimit = null)
    {
        $this->modeliAplikimit = $modeliAplikimit;

        return $this;
    }

    /**
     * Get modeliAplikimit
     *
     * @return \AiadBundle\Entity\SettingsModeliPleherimit 
     */
    public function getModeliAplikimit()
    {
        return $this->modeliAplikimit;
    }

    /**
     * Set produktiKomercialPleherimit
     *
     * @param \AiadBundle\Entity\SettingsProduktiKomercial $produktiKomercialPleherimit
     * @return AplikimePleherimi
     */
    public function setProduktiKomercialPleherimit(\AiadBundle\Entity\SettingsProduktiKomercial $produktiKomercialPleherimit = null)
    {
        $this->produktiKomercialPleherimit = $produktiKomercialPleherimit;

        return $this;
    }

    /**
     * Get produktiKomercialPleherimit
     *
     * @return \AiadBundle\Entity\SettingsProduktiKomercial 
     */
    public function getProduktiKomercialPleherimit()
    {
        return $this->produktiKomercialPleherimit;
    }

    /**
     * Set justifikimiAplikimit
     *
     * @param \AiadBundle\Entity\SettingsPleherimiJustifikim $justifikimiAplikimit
     * @return AplikimePleherimi
     */
    public function setJustifikimiAplikimit(\AiadBundle\Entity\SettingsPleherimiJustifikim $justifikimiAplikimit = null)
    {
        $this->justifikimiAplikimit = $justifikimiAplikimit;

        return $this;
    }

    /**
     * Get justifikimiAplikimit
     *
     * @return \AiadBundle\Entity\SettingsPleherimiJustifikim 
     */
    public function getJustifikimiAplikimit()
    {
        return $this->justifikimiAplikimit;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return AplikimePleherimi
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
