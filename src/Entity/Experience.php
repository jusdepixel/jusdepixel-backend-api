<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new Metadata\Get(),
        new Metadata\GetCollection(),
        new Metadata\Post(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can post experience."
        ),
        new Metadata\Put(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can update experience."
        ),
        new Metadata\Delete(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can delete experience."
        ),
    ]
)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $company = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $job = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $fromDate = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $toDate = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $mission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getFromDate(): ?string
    {
        return $this->fromDate;
    }

    public function setFromDate(string $fromDate): self
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    public function getToDate(): ?string
    {
        return $this->toDate;
    }

    public function setToDate(string $toDate): self
    {
        $this->toDate = $toDate;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }
}
