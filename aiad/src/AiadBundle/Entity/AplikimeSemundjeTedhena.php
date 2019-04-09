<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AplikimeSemundjeTedhena
 *
 * @ORM\Table(name="aplikime_semundje_tedhena", indexes={@ORM\Index(name="fk_arsye_semundje_1_idx", columns={"arsyeja_aplikimit_1"}), @ORM\Index(name="fk_arsye_semundje_2_idx", columns={"arsyeja_aplikimit_2"}), @ORM\Index(name="fk_justifikimi_idx", columns={"justifikimi"}), @ORM\Index(name="fk_produkti_komercial_njesia_idx", columns={"produkti_komercial_njesia"}), @ORM\Index(name="fk_produkti_komercial_emri_idx", columns={"produkti_komercial_emri"}), @ORM\Index(name="fk_lloji_aplikimit_idx", columns={"lloji_aplikimit"}), @ORM\Index(name="fk_tabela_permbledhese_semundjeve_idx", columns={"referimi_tabela_permbledhese"})})
 * @ORM\Entity
 */
class AplikimeSemundjeTedhena
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
     * @ORM\Column(name="produkti_komercial_doza", type="float", precision=10, scale=0, nullable=true)
     */
    private $produktiKomercialDoza;

    /**
     * @var string
     *
     * @ORM\Column(name="materiali_aktiv_lenda_aktive", type="string", length=100, nullable=true)
     */
    private $materialiAktivLendaAktive;

    /**
     * @var float
     *
     * @ORM\Column(name="materiali_aktiv_pastertia", type="float", precision=10, scale=0, nullable=true)
     */
    private $materialiAktivPastertia;

    /**
     * @var string
     *
     * @ORM\Column(name="emri_firmes", type="string", length=100, nullable=true)
     */
    private $emriFirmes;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=150, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsArsyeAplikimiSemundje
     *
     * @ORM\ManyToOne(targetEntity="SettingsArsyeAplikimiSemundje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arsyeja_aplikimit_1", referencedColumnName="id")
     * })
     */
    private $arsyejaAplikimit1;

    /**
     * @var \SettingsArsyeAplikimiSemundje
     *
     * @ORM\ManyToOne(targetEntity="SettingsArsyeAplikimiSemundje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="arsyeja_aplikimit_2", referencedColumnName="id")
     * })
     */
    private $arsyejaAplikimit2;

    /**
     * @var \SettingsJustifikimAplikimiSemundje
     *
     * @ORM\ManyToOne(targetEntity="SettingsJustifikimAplikimiSemundje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="justifikimi", referencedColumnName="id")
     * })
     */
    private $justifikimi;

    /**
     * @var \SettingsDozaNjesia
     *
     * @ORM\ManyToOne(targetEntity="SettingsDozaNjesia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produkti_komercial_njesia", referencedColumnName="id")
     * })
     */
    private $produktiKomercialNjesia;

    /**
     * @var \SettingsProduktiKomercial
     *
     * @ORM\ManyToOne(targetEntity="SettingsProduktiKomercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produkti_komercial_emri", referencedColumnName="id")
     * })
     */
    private $produktiKomercialEmri;

    /**
     * @var \AplikimeSemundje
     *
     * @ORM\ManyToOne(targetEntity="AplikimeSemundje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lloji_aplikimit", referencedColumnName="id")
     * })
     */
    private $llojiAplikimit;

    /**
     * @var \TabelaPermbledheseAplikimSemundjesh
     *
     * @ORM\ManyToOne(targetEntity="TabelaPermbledheseAplikimSemundjesh")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referimi_tabela_permbledhese", referencedColumnName="id")
     * })
     */
    private $referimiTabelaPermbledhese;



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
     * @return AplikimeSemundjeTedhena
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
     * Set produktiKomercialDoza
     *
     * @param float $produktiKomercialDoza
     * @return AplikimeSemundjeTedhena
     */
    public function setProduktiKomercialDoza($produktiKomercialDoza)
    {
        $this->produktiKomercialDoza = $produktiKomercialDoza;

        return $this;
    }

    /**
     * Get produktiKomercialDoza
     *
     * @return float 
     */
    public function getProduktiKomercialDoza()
    {
        return $this->produktiKomercialDoza;
    }

    /**
     * Set materialiAktivLendaAktive
     *
     * @param string $materialiAktivLendaAktive
     * @return AplikimeSemundjeTedhena
     */
    public function setMaterialiAktivLendaAktive($materialiAktivLendaAktive)
    {
        $this->materialiAktivLendaAktive = $materialiAktivLendaAktive;

        return $this;
    }

    /**
     * Get materialiAktivLendaAktive
     *
     * @return string 
     */
    public function getMaterialiAktivLendaAktive()
    {
        return $this->materialiAktivLendaAktive;
    }

    /**
     * Set materialiAktivPastertia
     *
     * @param float $materialiAktivPastertia
     * @return AplikimeSemundjeTedhena
     */
    public function setMaterialiAktivPastertia($materialiAktivPastertia)
    {
        $this->materialiAktivPastertia = $materialiAktivPastertia;

        return $this;
    }

    /**
     * Get materialiAktivPastertia
     *
     * @return float 
     */
    public function getMaterialiAktivPastertia()
    {
        return $this->materialiAktivPastertia;
    }

    /**
     * Set emriFirmes
     *
     * @param string $emriFirmes
     * @return AplikimeSemundjeTedhena
     */
    public function setEmriFirmes($emriFirmes)
    {
        $this->emriFirmes = $emriFirmes;

        return $this;
    }

    /**
     * Get emriFirmes
     *
     * @return string 
     */
    public function getEmriFirmes()
    {
        return $this->emriFirmes;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return AplikimeSemundjeTedhena
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
     * Set arsyejaAplikimit1
     *
     * @param \AiadBundle\Entity\SettingsArsyeAplikimiSemundje $arsyejaAplikimit1
     * @return AplikimeSemundjeTedhena
     */
    public function setArsyejaAplikimit1(\AiadBundle\Entity\SettingsArsyeAplikimiSemundje $arsyejaAplikimit1 = null)
    {
        $this->arsyejaAplikimit1 = $arsyejaAplikimit1;

        return $this;
    }

    /**
     * Get arsyejaAplikimit1
     *
     * @return \AiadBundle\Entity\SettingsArsyeAplikimiSemundje 
     */
    public function getArsyejaAplikimit1()
    {
        return $this->arsyejaAplikimit1;
    }

    /**
     * Set arsyejaAplikimit2
     *
     * @param \AiadBundle\Entity\SettingsArsyeAplikimiSemundje $arsyejaAplikimit2
     * @return AplikimeSemundjeTedhena
     */
    public function setArsyejaAplikimit2(\AiadBundle\Entity\SettingsArsyeAplikimiSemundje $arsyejaAplikimit2 = null)
    {
        $this->arsyejaAplikimit2 = $arsyejaAplikimit2;

        return $this;
    }

    /**
     * Get arsyejaAplikimit2
     *
     * @return \AiadBundle\Entity\SettingsArsyeAplikimiSemundje 
     */
    public function getArsyejaAplikimit2()
    {
        return $this->arsyejaAplikimit2;
    }

    /**
     * Set justifikimi
     *
     * @param \AiadBundle\Entity\SettingsJustifikimAplikimiSemundje $justifikimi
     * @return AplikimeSemundjeTedhena
     */
    public function setJustifikimi(\AiadBundle\Entity\SettingsJustifikimAplikimiSemundje $justifikimi = null)
    {
        $this->justifikimi = $justifikimi;

        return $this;
    }

    /**
     * Get justifikimi
     *
     * @return \AiadBundle\Entity\SettingsJustifikimAplikimiSemundje 
     */
    public function getJustifikimi()
    {
        return $this->justifikimi;
    }

    /**
     * Set produktiKomercialNjesia
     *
     * @param \AiadBundle\Entity\SettingsDozaNjesia $produktiKomercialNjesia
     * @return AplikimeSemundjeTedhena
     */
    public function setProduktiKomercialNjesia(\AiadBundle\Entity\SettingsDozaNjesia $produktiKomercialNjesia = null)
    {
        $this->produktiKomercialNjesia = $produktiKomercialNjesia;

        return $this;
    }

    /**
     * Get produktiKomercialNjesia
     *
     * @return \AiadBundle\Entity\SettingsDozaNjesia 
     */
    public function getProduktiKomercialNjesia()
    {
        return $this->produktiKomercialNjesia;
    }

    /**
     * Set produktiKomercialEmri
     *
     * @param \AiadBundle\Entity\SettingsProduktiKomercial $produktiKomercialEmri
     * @return AplikimeSemundjeTedhena
     */
    public function setProduktiKomercialEmri(\AiadBundle\Entity\SettingsProduktiKomercial $produktiKomercialEmri = null)
    {
        $this->produktiKomercialEmri = $produktiKomercialEmri;

        return $this;
    }

    /**
     * Get produktiKomercialEmri
     *
     * @return \AiadBundle\Entity\SettingsProduktiKomercial 
     */
    public function getProduktiKomercialEmri()
    {
        return $this->produktiKomercialEmri;
    }

    /**
     * Set llojiAplikimit
     *
     * @param \AiadBundle\Entity\AplikimeSemundje $llojiAplikimit
     * @return AplikimeSemundjeTedhena
     */
    public function setLlojiAplikimit(\AiadBundle\Entity\AplikimeSemundje $llojiAplikimit = null)
    {
        $this->llojiAplikimit = $llojiAplikimit;

        return $this;
    }

    /**
     * Get llojiAplikimit
     *
     * @return \AiadBundle\Entity\AplikimeSemundje 
     */
    public function getLlojiAplikimit()
    {
        return $this->llojiAplikimit;
    }

    /**
     * Set referimiTabelaPermbledhese
     *
     * @param \AiadBundle\Entity\TabelaPermbledheseAplikimSemundjesh $referimiTabelaPermbledhese
     * @return AplikimeSemundjeTedhena
     */
    public function setReferimiTabelaPermbledhese(\AiadBundle\Entity\TabelaPermbledheseAplikimSemundjesh $referimiTabelaPermbledhese = null)
    {
        $this->referimiTabelaPermbledhese = $referimiTabelaPermbledhese;

        return $this;
    }

    /**
     * Get referimiTabelaPermbledhese
     *
     * @return \AiadBundle\Entity\TabelaPermbledheseAplikimSemundjesh 
     */
    public function getReferimiTabelaPermbledhese()
    {
        return $this->referimiTabelaPermbledhese;
    }
}
