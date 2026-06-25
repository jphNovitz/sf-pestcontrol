<?php

namespace App\Entity;

use App\Repository\InterventionRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRequestRepository::class)]
class InterventionRequest
{
    public const STATUS_NEW = 'Nouvelle';
    public const STATUS_CONTACTED = 'Contacté';
    public const STATUS_PLANNED = 'Planifiée';
    public const STATUS_DONE = 'Terminée';
    public const STATUS_CANCELLED = 'Annulée';

    public const URGENCY_REMOTE_NEST = 'Nid éloigné';
    public const URGENCY_PASSAGE_AREA = 'Zone de passage';
    public const URGENCY_NEAR_HOME = 'Proche habitation';
    public const URGENCY_IMMEDIATE_DANGER = 'Danger immédiat';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private string $name = '';

    #[ORM\Column(length: 40)]
    private string $phone = '';

    #[ORM\Column(length: 120)]
    private string $city = '';

    #[ORM\Column(length: 255)]
    private string $address = '';

    #[ORM\Column(length: 80)]
    private string $pestType = '';

    #[ORM\Column(length: 120)]
    private string $nestLocation = '';

    #[ORM\Column(length: 80)]
    private string $urgency = self::URGENCY_REMOTE_NEST;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoFilename = null;

    #[ORM\Column(length: 40)]
    private string $status = self::STATUS_NEW;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $internalNotes = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column]
    private \DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $now = new \DateTimeImmutable();
        $this->createdAt = $now;
        $this->updatedAt = $now;
    }

    public function __toString(): string
    {
        return sprintf('#%s %s - %s', $this->id ?? 'new', $this->name, $this->city);
    }

    public static function getStatuses(): array
    {
        return [
            self::STATUS_NEW => self::STATUS_NEW,
            self::STATUS_CONTACTED => self::STATUS_CONTACTED,
            self::STATUS_PLANNED => self::STATUS_PLANNED,
            self::STATUS_DONE => self::STATUS_DONE,
            self::STATUS_CANCELLED => self::STATUS_CANCELLED,
        ];
    }

    public static function getUrgencies(): array
    {
        return [
            self::URGENCY_REMOTE_NEST => self::URGENCY_REMOTE_NEST,
            self::URGENCY_PASSAGE_AREA => self::URGENCY_PASSAGE_AREA,
            self::URGENCY_NEAR_HOME => self::URGENCY_NEAR_HOME,
            self::URGENCY_IMMEDIATE_DANGER => self::URGENCY_IMMEDIATE_DANGER,
        ];
    }

    public function touch(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPestType(): string
    {
        return $this->pestType;
    }

    public function setPestType(string $pestType): static
    {
        $this->pestType = $pestType;

        return $this;
    }

    public function getNestLocation(): string
    {
        return $this->nestLocation;
    }

    public function setNestLocation(string $nestLocation): static
    {
        $this->nestLocation = $nestLocation;

        return $this;
    }

    public function getUrgency(): string
    {
        return $this->urgency;
    }

    public function setUrgency(string $urgency): static
    {
        $this->urgency = $urgency;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getPhotoFilename(): ?string
    {
        return $this->photoFilename;
    }

    public function setPhotoFilename(?string $photoFilename): static
    {
        $this->photoFilename = $photoFilename;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        $this->touch();

        return $this;
    }

    public function getInternalNotes(): ?string
    {
        return $this->internalNotes;
    }

    public function setInternalNotes(?string $internalNotes): static
    {
        $this->internalNotes = $internalNotes;
        $this->touch();

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
