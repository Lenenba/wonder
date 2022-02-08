<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'veuillez renseinger un titre')]
    #[Assert\Length(min: 10, minMessage: 'veuillez detailler votre titre', max:255, maxMessage:'le titre de votre question est trop long')]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'veuillez renseinger un question')]
    #[Assert\Length(min: 100, minMessage: 'veuillez detailler votre question')]
    private $content;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'integer')]
    private $rating;

    #[ORM\Column(type: 'integer')]
    private $nbrOfResponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getNbrOfResponse(): ?int
    {
        return $this->nbrOfResponse;
    }

    public function setNbrOfResponse(int $nbrOfResponse): self
    {
        $this->nbrOfResponse = $nbrOfResponse;

        return $this;
    }
}
