<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new Metadata\Get(),
        new Metadata\GetCollection(),
        new Metadata\Post(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can post training."
        ),
        new Metadata\Put(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can update training."
        ),
        new Metadata\Delete(
            security: "is_granted('ROLE_ADMIN')",
            securityMessage: "Only admins can delete training."
        ),
    ]
)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $year = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $school = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $domain = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $degree = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(string $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }
}
