<?php

namespace EmergenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity(repositoryClass="EmergenceBundle\Repository\AbonnementRepository")
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="certificat", type="string", length=255)
     */
    private $certificat;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=255)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="date_certficat", type="string", length=255)
     */
    private $dateCertficat;

    /**
     * @var string
     *
     * @ORM\Column(name="type_abonnement", type="string", length=255)
     */
    private $typeAbonnement;

    /**
     * @var string
     *
     * @ORM\Column(name="date_abonnement", type="string", length=255)
     */
    private $dateAbonnement;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="type_paiement", type="string", length=255)
     */
    private $typePaiement;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity="Adherent", inversedBy="abonnents")
     * @ORM\JoinColumn(name="adherent_id", referencedColumnName="id")
     */
    private $adherent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set certificat
     *
     * @param string $certificat
     *
     * @return Abonnement
     */
    public function setCertificat($certificat)
    {
        $this->certificat = $certificat;

        return $this;
    }

    /**
     * Get certificat
     *
     * @return string
     */
    public function getCertificat()
    {
        return $this->certificat;
    }

    /**
     * Set activite
     *
     * @param string $activite
     *
     * @return Abonnement
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set dateCertficat
     *
     * @param string $dateCertficat
     *
     * @return Abonnement
     */
    public function setDateCertficat($dateCertficat)
    {
        $this->dateCertficat = $dateCertficat;

        return $this;
    }

    /**
     * Get dateCertficat
     *
     * @return string
     */
    public function getDateCertficat()
    {
        return $this->dateCertficat;
    }

    /**
     * Set typeAbonnement
     *
     * @param string $typeAbonnement
     *
     * @return Abonnement
     */
    public function setTypeAbonnement($typeAbonnement)
    {
        $this->typeAbonnement = $typeAbonnement;

        return $this;
    }

    /**
     * Get typeAbonnement
     *
     * @return string
     */
    public function getTypeAbonnement()
    {
        return $this->typeAbonnement;
    }

    /**
     * Set dateAbonnement
     *
     * @param string $dateAbonnement
     *
     * @return Abonnement
     */
    public function setDateAbonnement($dateAbonnement)
    {
        $this->dateAbonnement = $dateAbonnement;

        return $this;
    }

    /**
     * Get dateAbonnement
     *
     * @return string
     */
    public function getDateAbonnement()
    {
        return $this->dateAbonnement;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Abonnement
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set typePaiement
     *
     * @param string $typePaiement
     *
     * @return Abonnement
     */
    public function setTypePaiement($typePaiement)
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    /**
     * Get typePaiement
     *
     * @return string
     */
    public function getTypePaiement()
    {
        return $this->typePaiement;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Abonnement
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set adherent
     *
     * @param \EmergenceBundle\Entity\Adherent $adherent
     *
     * @return Abonnement
     */
    public function setAdherent(\EmergenceBundle\Entity\Adherent $adherent = null)
    {
        $this->adherent = $adherent;

        return $this;
    }

    /**
     * Get adherent
     *
     * @return \EmergenceBundle\Entity\Adherent
     */
    public function getAdherent()
    {
        return $this->adherent;
    }
}