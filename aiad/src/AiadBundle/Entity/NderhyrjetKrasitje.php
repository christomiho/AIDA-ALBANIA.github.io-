<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NderhyrjetKrasitje
 *
 * @ORM\Table(name="nderhyrjet_krasitje", indexes={@ORM\Index(name="fk_tipi_krasitjes_idx", columns={"tipi_krasitjes"}), @ORM\Index(name="fk_menyra_eleminimit_idx", columns={"menyra_eliminimit"}), @ORM\Index(name="fk_mjetet_perdorura_idx", columns={"mjetet_perdorura"}), @ORM\Index(name="fk_krasitje_parcela_idx", columns={"parcela"}), @ORM\Index(name="fk_produkti_dizinfektues_idx", columns={"produkti_dizinfektim"})})
 * @ORM\Entity
 */
class NderhyrjetKrasitje
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
     * @ORM\Column(name="data_krasitjes", type="date", nullable=true)
     */
    private $dataKrasitjes;

    /**
     * @var float
     *
     * @ORM\Column(name="kohezgjatja", type="float", precision=10, scale=0, nullable=true)
     */
    private $kohezgjatja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_eliminimi_mbetjeve", type="date", nullable=true)
     */
    private $dataEliminimiMbetjeve;

    /**
     * @var string
     *
     * @ORM\Column(name="vezhgime", type="string", length=150, nullable=true)
     */
    private $vezhgime;

    /**
     * @var \SettingsTipiKrasitjes
     *
     * @ORM\ManyToOne(targetEntity="SettingsTipiKrasitjes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipi_krasitjes", referencedColumnName="id")
     * })
     */
    private $tipiKrasitjes;

    /**
     * @var \SettingsMenyraEleminimit
     *
     * @ORM\ManyToOne(targetEntity="SettingsMenyraEleminimit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menyra_eliminimit", referencedColumnName="id")
     * })
     */
    private $menyraEliminimit;

    /**
     * @var \SettingsMjete
     *
     * @ORM\ManyToOne(targetEntity="SettingsMjete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mjetet_perdorura", referencedColumnName="id")
     * })
     */
    private $mjetetPerdorura;

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
     * @var \SettingsKrasitjeProduktiDizinfektues
     *
     * @ORM\ManyToOne(targetEntity="SettingsKrasitjeProduktiDizinfektues")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produkti_dizinfektim", referencedColumnName="id")
     * })
     */
    private $produktiDizinfektim;



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
     * Set dataKrasitjes
     *
     * @param \DateTime $dataKrasitjes
     * @return NderhyrjetKrasitje
     */
    public function setDataKrasitjes($dataKrasitjes)
    {
        $this->dataKrasitjes = $dataKrasitjes;

        return $this;
    }

    /**
     * Get dataKrasitjes
     *
     * @return \DateTime
     */
    public function getDataKrasitjes()
    {
        return $this->dataKrasitjes;
    }

    /**
     * Set kohezgjatja
     *
     * @param float $kohezgjatja
     * @return NderhyrjetKrasitje
     */
    public function setKohezgjatja($kohezgjatja)
    {
        $this->kohezgjatja = $kohezgjatja;

        return $this;
    }

    /**
     * Get kohezgjatja
     *
     * @return float 
     */
    public function getKohezgjatja()
    {
        return $this->kohezgjatja;
    }

    /**
     * Set dataEliminimiMbetjeve
     *
     * @param \DateTime $dataEliminimiMbetjeve
     * @return NderhyrjetKrasitje
     */
    public function setDataEliminimiMbetjeve($dataEliminimiMbetjeve)
    {
        $this->dataEliminimiMbetjeve = $dataEliminimiMbetjeve;

        return $this;
    }

    /**
     * Get dataEliminimiMbetjeve
     *
     * @return \DateTime 
     */
    public function getDataEliminimiMbetjeve()
    {
        return $this->dataEliminimiMbetjeve;
    }

    /**
     * Set vezhgime
     *
     * @param string $vezhgime
     * @return NderhyrjetKrasitje
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
     * Set tipiKrasitjes
     *
     * @param \AiadBundle\Entity\SettingsTipiKrasitjes $tipiKrasitjes
     * @return NderhyrjetKrasitje
     */
    public function setTipiKrasitjes(\AiadBundle\Entity\SettingsTipiKrasitjes $tipiKrasitjes = null)
    {
        $this->tipiKrasitjes = $tipiKrasitjes;

        return $this;
    }

    /**
     * Get tipiKrasitjes
     *
     * @return \AiadBundle\Entity\SettingsTipiKrasitjes 
     */
    public function getTipiKrasitjes()
    {
        return $this->tipiKrasitjes;
    }

    /**
     * Set menyraEliminimit
     *
     * @param \AiadBundle\Entity\SettingsMenyraEleminimit $menyraEliminimit
     * @return NderhyrjetKrasitje
     */
    public function setMenyraEliminimit(\AiadBundle\Entity\SettingsMenyraEleminimit $menyraEliminimit = null)
    {
        $this->menyraEliminimit = $menyraEliminimit;

        return $this;
    }

    /**
     * Get menyraEliminimit
     *
     * @return \AiadBundle\Entity\SettingsMenyraEleminimit 
     */
    public function getMenyraEliminimit()
    {
        return $this->menyraEliminimit;
    }

    /**
     * Set mjetetPerdorura
     *
     * @param \AiadBundle\Entity\SettingsMjete $mjetetPerdorura
     * @return NderhyrjetKrasitje
     */
    public function setMjetetPerdorura(\AiadBundle\Entity\SettingsMjete $mjetetPerdorura = null)
    {
        $this->mjetetPerdorura = $mjetetPerdorura;

        return $this;
    }

    /**
     * Get mjetetPerdorura
     *
     * @return \AiadBundle\Entity\SettingsMjete 
     */
    public function getMjetetPerdorura()
    {
        return $this->mjetetPerdorura;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return NderhyrjetKrasitje
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

    /**
     * Set produktiDizinfektim
     *
     * @param \AiadBundle\Entity\SettingsKrasitjeProduktiDizinfektues $produktiDizinfektim
     * @return NderhyrjetKrasitje
     */
    public function setProduktiDizinfektim(\AiadBundle\Entity\SettingsKrasitjeProduktiDizinfektues $produktiDizinfektim = null)
    {
        $this->produktiDizinfektim = $produktiDizinfektim;

        return $this;
    }

    /**
     * Get produktiDizinfektim
     *
     * @return \AiadBundle\Entity\SettingsKrasitjeProduktiDizinfektues 
     */
    public function getProduktiDizinfektim()
    {
        return $this->produktiDizinfektim;
    }
}
