<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryRepository::class)]
class History
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $firstIn;

    #[ORM\Column]
    private int $secondIn;

    #[ORM\Column]
    private int $firstOut;

    #[ORM\Column]
    private int $secondOut;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(nullable: true)]
    private \DateTimeImmutable $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstIn(): int
    {
        return $this->firstIn;
    }

    public function setFirstIn(int $firstIn): static
    {
        $this->firstIn = $firstIn;

        return $this;
    }

    public function getSecondIn(): int
    {
        return $this->secondIn;
    }

    public function setSecondIn(int $secondIn): static
    {
        $this->secondIn = $secondIn;

        return $this;
    }

    public function getFirstOut(): int
    {
        return $this->firstOut;
    }

    public function setFirstOut(int $firstOut): static
    {
        $this->firstOut = $firstOut;

        return $this;
    }

    public function getSecondOut(): int
    {
        return $this->secondOut;
    }

    public function setSecondOut(int $secondOut): static
    {
        $this->secondOut = $secondOut;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
