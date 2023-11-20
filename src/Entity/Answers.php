<?php

namespace App\Entity;

use App\Repository\AnswersRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: AnswersRepository::class)]
class Answers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $corrected = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $questions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
    public function isCorrected(): ?bool
    {
        return $this->corrected;
    }

    public function setCorrected(bool $corrected): static
    {
        $this->corrected = $corrected;

        return $this;
    }

    public function getQuestions(): ?Questions
    {
        return $this->questions;
    }

    public function setQuestions(?Questions $questions): static
    {
        $this->questions = $questions;

        return $this;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
