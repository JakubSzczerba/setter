<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Service;

use App\Entity\History;
use App\Repository\HistoryRepository;
use Doctrine\ORM\EntityManagerInterface;

class HistoryService
{
    private HistoryRepository $historyRepository;

    private EntityManagerInterface $em;

    public function __construct(HistoryRepository $historyRepository, EntityManagerInterface $em)
    {
        $this->historyRepository = $historyRepository;
        $this->em = $em;
    }

    public function postValues(array $data): string
    {
        $first = $data['first'];
        $second = $data['second'];
        $history = $this->historyRepository->getHistory();

        if (empty($history)) {
            $history = new History();
            $history
                ->setFirstIn($first)
                ->setSecondIn($second)
                ->setCreatedAt(new \DateTimeImmutable('now'));
            $this->em->persist($history);
            $message = 'Values have been added';
        } else {
            $history[0]
                ->setFirstIn($first)
                ->setSecondIn($second)
                ->setUpdatedAt(new \DateTimeImmutable('now'));
            $message = 'Values has been updated.';
        }
        $this->em->flush();

        return $message;
    }

    public function getValues(): array
    {
        return $this->historyRepository->getAll();
    }
}