<?php

namespace EmergenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherent
 *
 * @ORM\Table(name="adherent")
 * @ORM\Entity(repositoryClass="EmergenceBundle\Repository\AdherentRepository")
 */
class Adherent
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string", length=255)
     */
    private $dateNaissance;

    /**
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="adherent")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="certificat", type="string", length=255)
     */
    private $certificat;

    /**
     * @ORM\ManyToOne(targetEntity="Situation", inversedBy="adherent")
     * @ORM\JoinColumn(name="situation_id", referencedColumnName="id")
     */
    private $situation;

    /**
     * @ORM\ManyToOne(targetEntity="Quartier", inversedBy="adherent")
     * @ORM\JoinColumn(name="quartier_id", referencedColumnName="id")
     */
    private $quartier;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_secu", type="integer")
     */
    private $numeroSecu;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone_fixe", type="integer")
     */
    private $telephoneFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="chemins_certificat", type="string", length=255)
     */
    private $cheminsCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * Adherent constructor.
     */
    public function __construct()
    {
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Adherent
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Adherent
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param string $dateNaissance
     *
     * @return Adherent
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Adherent
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Adherent
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Adherent
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Adherent
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Adherent
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Adherent
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set certificat
     *
     * @param string $certificat
     *
     * @return Adherent
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
     * Set situation
     *
     * @param string $situation
     *
     * @return Adherent
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get situation
     *
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * Set quartier
     *
     * @param integer $quartier
     *
     * @return Adherent
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return int
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * Set numeroSecu
     *
     * @param integer $numeroSecu
     *
     * @return Adherent
     */
    public function setNumeroSecu($numeroSecu)
    {
        $this->numeroSecu = $numeroSecu;

        return $this;
    }

    /**
     * Get numeroSecu
     *
     * @return int
     */
    public function getNumeroSecu()
    {
        return $this->numeroSecu;
    }

    /**
     * Set telephoneFixe
     *
     * @param integer $telephoneFixe
     *
     * @return Adherent
     */
    public function setTelephoneFixe($telephoneFixe)
    {
        $this->telephoneFixe = $telephoneFixe;

        return $this;
    }

    /**
     * Get telephoneFixe
     *
     * @return int
     */
    public function getTelephoneFixe()
    {
        return $this->telephoneFixe;
    }

    /**
     * Set cheminsCertificat
     *
     * @param string $cheminsCertificat
     *
     * @return Adherent
     */
    public function setCheminsCertificat($cheminsCertificat)
    {
        $this->cheminsCertificat = $cheminsCertificat;

        return $this;
    }

    /**
     * Get cheminsCertificat
     *
     * @return string
     */
    public function getCheminsCertificat()
    {
        return $this->cheminsCertificat;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Adherent
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}

