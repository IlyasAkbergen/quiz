<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Repository\AnswerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Question::class)]
    private ?Question $question = null;

    #[ORM\Column]
    private ?int $questionId = null;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Test::class)]
    private ?Test $test = null;

    #[ORM\Column(type: Types::JSON)]
    private array $answers = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): static
    {
        $this->answers = $answers;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(Test $test): static
    {
        $this->test = $test;

        return $this;
    }

    public function getQuestionId(): ?int
    {
        return $this->questionId;
    }

    public function setQuestionId(?int $questionId): void
    {
        $this->questionId = $questionId;
    }
}
