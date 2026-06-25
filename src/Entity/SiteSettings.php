<?php

namespace App\Entity;

use App\Repository\SiteSettingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteSettingsRepository::class)]
class SiteSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private string $siteName = 'Guêpes & Frelons Intervention';

    #[ORM\Column(length: 120)]
    private string $headerTagline = 'Intervention en Brabant wallon';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logoFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $faviconFilename = null;

    #[ORM\Column(length: 180)]
    private string $logoAlt = 'Logo Guêpes & Frelons Intervention';

    #[ORM\Column(length: 180)]
    private string $heroTitle = 'Intervention guêpes et frelons en Brabant wallon';

    #[ORM\Column(type: Types::TEXT)]
    private string $heroSubtitle = 'Intervention par un indépendant pour sécuriser une habitation, un jardin ou un local professionnel. Décrivez la situation, gardez vos distances et préparez les informations utiles.';

    #[ORM\Column(length: 40)]
    private string $whatsappPhoneNumber = '+32400000000';

    #[ORM\Column(type: Types::TEXT)]
    private string $whatsappMessage = 'Bonjour, je souhaite une intervention pour un nid de guêpes/frelons en Brabant wallon.';

    #[ORM\Column(length: 180)]
    private string $notificationEmail = 'independant@gmail.com';

    #[ORM\Column(type: Types::TEXT)]
    private string $emergencyNotice = "Danger immédiat, allergie connue ou attaque en cours ? Contactez directement via WhatsApp plutôt que d'attendre une réponse au formulaire.";

    #[ORM\Column(type: Types::TEXT)]
    private string $formIntro = "Ce formulaire prépare la prise de contact. Il enregistre la demande et transmet les informations à l'indépendant.";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): string
    {
        return $this->siteName;
    }

    public function setSiteName(string $siteName): static
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getHeaderTagline(): string
    {
        return $this->headerTagline;
    }

    public function setHeaderTagline(string $headerTagline): static
    {
        $this->headerTagline = $headerTagline;

        return $this;
    }

    public function getLogoFilename(): ?string
    {
        return $this->logoFilename;
    }

    public function setLogoFilename(?string $logoFilename): static
    {
        $this->logoFilename = $logoFilename;

        return $this;
    }

    public function getFaviconFilename(): ?string
    {
        return $this->faviconFilename;
    }

    public function setFaviconFilename(?string $faviconFilename): static
    {
        $this->faviconFilename = $faviconFilename;

        return $this;
    }

    public function getLogoAlt(): string
    {
        return $this->logoAlt;
    }

    public function setLogoAlt(string $logoAlt): static
    {
        $this->logoAlt = $logoAlt;

        return $this;
    }

    public function getHeroTitle(): string
    {
        return $this->heroTitle;
    }

    public function setHeroTitle(string $heroTitle): static
    {
        $this->heroTitle = $heroTitle;

        return $this;
    }

    public function getHeroSubtitle(): string
    {
        return $this->heroSubtitle;
    }

    public function setHeroSubtitle(string $heroSubtitle): static
    {
        $this->heroSubtitle = $heroSubtitle;

        return $this;
    }

    public function getWhatsappPhoneNumber(): string
    {
        return $this->whatsappPhoneNumber;
    }

    public function setWhatsappPhoneNumber(string $whatsappPhoneNumber): static
    {
        $this->whatsappPhoneNumber = $whatsappPhoneNumber;

        return $this;
    }

    public function getWhatsappMessage(): string
    {
        return $this->whatsappMessage;
    }

    public function setWhatsappMessage(string $whatsappMessage): static
    {
        $this->whatsappMessage = $whatsappMessage;

        return $this;
    }

    public function getNotificationEmail(): string
    {
        return $this->notificationEmail;
    }

    public function setNotificationEmail(string $notificationEmail): static
    {
        $this->notificationEmail = $notificationEmail;

        return $this;
    }

    public function getEmergencyNotice(): string
    {
        return $this->emergencyNotice;
    }

    public function setEmergencyNotice(string $emergencyNotice): static
    {
        $this->emergencyNotice = $emergencyNotice;

        return $this;
    }

    public function getFormIntro(): string
    {
        return $this->formIntro;
    }

    public function setFormIntro(string $formIntro): static
    {
        $this->formIntro = $formIntro;

        return $this;
    }
}
