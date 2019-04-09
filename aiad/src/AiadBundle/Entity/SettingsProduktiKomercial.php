<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsProduktiKomercial
 *
 * @ORM\Table(name="settings_produkti_komercial", indexes={@ORM\Index(name="fk_lenda_aktive_idx", columns={"lenda_aktive"}), @ORM\Index(name="fk_firma_idx", columns={"firma"}), @ORM\Index(name="fk_lloji_produktit_idx", columns={"kategoria_produktit_komercial"})})
 * @ORM\Entity
 */
class SettingsProduktiKomercial
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
     * @var string
     *
     * @ORM\Column(name="emri", type="string", length=150, nullable=true)
     */
    private $emri;

    /**
     * @var float
     *
     * @ORM\Column(name="pastertia", type="float", precision=10, scale=0, nullable=true)
     */
    private $pastertia;

    /**
     * @var string
     *
     * @ORM\Column(name="perdorimi_rekomanduar", type="string", length=250, nullable=true)
     */
    private $perdorimiRekomanduar;

    /**
     * @var \SettingsLendaAktive
     *
     * @ORM\ManyToOne(targetEntity="SettingsLendaAktive")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lenda_aktive", referencedColumnName="id")
     * })
     */
    private $lendaAktive;

    /**
     * @var \SettingsFirmaProdukteve
     *
     * @ORM\ManyToOne(targetEntity="SettingsFirmaProdukteve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="firma", referencedColumnName="id")
     * })
     */
    private $firma;

    /**
     * @var \LlojiProduktitKomercial
     *
     * @ORM\ManyToOne(targetEntity="LlojiProduktitKomercial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="kategoria_produktit_komercial", referencedColumnName="id")
     * })
     */
    private $kategoriaProduktitKomercial;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getEmri();
    }


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
     * Set emri
     *
     * @param string $emri
     * @return SettingsProduktiKomercial
     */
    public function setEmri($emri)
    {
        $this->emri = $emri;

        return $this;
    }

    /**
     * Get emri
     *
     * @return string 
     */
    public function getEmri()
    {
        return $this->emri;
    }

    /**
     * Set pastertia
     *
     * @param float $pastertia
     * @return SettingsProduktiKomercial
     */
    public function setPastertia($pastertia)
    {
        $this->pastertia = $pastertia;

        return $this;
    }

    /**
     * Get pastertia
     *
     * @return float 
     */
    public function getPastertia()
    {
        return $this->pastertia;
    }

    /**
     * Set perdorimiRekomanduar
     *
     * @param string $perdorimiRekomanduar
     * @return SettingsProduktiKomercial
     */
    public function setPerdorimiRekomanduar($perdorimiRekomanduar)
    {
        $this->perdorimiRekomanduar = $perdorimiRekomanduar;

        return $this;
    }

    /**
     * Get perdorimiRekomanduar
     *
     * @return string 
     */
    public function getPerdorimiRekomanduar()
    {
        return $this->perdorimiRekomanduar;
    }

    /**
     * Set lendaAktive
     *
     * @param \AiadBundle\Entity\SettingsLendaAktive $lendaAktive
     * @return SettingsProduktiKomercial
     */
    public function setLendaAktive(\AiadBundle\Entity\SettingsLendaAktive $lendaAktive = null)
    {
        $this->lendaAktive = $lendaAktive;

        return $this;
    }

    /**
     * Get lendaAktive
     *
     * @return \AiadBundle\Entity\SettingsLendaAktive 
     */
    public function getLendaAktive()
    {
        return $this->lendaAktive;
    }

    /**
     * Set firma
     *
     * @param \AiadBundle\Entity\SettingsFirmaProdukteve $firma
     * @return SettingsProduktiKomercial
     */
    public function setFirma(\AiadBundle\Entity\SettingsFirmaProdukteve $firma = null)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get firma
     *
     * @return \AiadBundle\Entity\SettingsFirmaProdukteve 
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * Set kategoriaProduktitKomercial
     *
     * @param \AiadBundle\Entity\LlojiProduktitKomercial $kategoriaProduktitKomercial
     * @return SettingsProduktiKomercial
     */
    public function setKategoriaProduktitKomercial(\AiadBundle\Entity\LlojiProduktitKomercial $kategoriaProduktitKomercial = null)
    {
        $this->kategoriaProduktitKomercial = $kategoriaProduktitKomercial;

        return $this;
    }

    /**
     * Get kategoriaProduktitKomercial
     *
     * @return \AiadBundle\Entity\LlojiProduktitKomercial 
     */
    public function getKategoriaProduktitKomercial()
    {
        return $this->kategoriaProduktitKomercial;
    }
}
