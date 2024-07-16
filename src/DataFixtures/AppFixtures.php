<?php

namespace App\DataFixtures;

use App\Domain\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $rawData = [
            [
                'text' => '1 + 1 = ',
                'options' => [
                    1 => 3,
                    2 => 2,
                    3 => 0,
                ],
                'answers' => [
                    2,
                ],
            ],
            [
                'text' => '2 + 2 = ',
                'options' => [
                    1 => 4,
                    2 => '3 + 1',
                    3 => 10,
                ],
                'answers' => [
                    1, 2,
                ],
            ],
            [
                'text' => '3 + 3 = ',
                'options' => [
                    1 => '1 + 5',
                    2 => 1,
                    3 => 6,
                    4 => '2 + 4',
                ],
                'answers' => [
                    1, 3, 4,
                ],
            ],
            [
                'text' => '4 + 4 = ',
                'options' => [
                    1 => 8,
                    2 => 4,
                    3 => 0,
                    4 => '0 + 8',
                ],
                'answers' => [
                    1, 4,
                ],
            ],
            [
                'text' => '5 + 5 = ',
                'options' => [
                    1 => 6,
                    2 => 18,
                    3 => 10,
                    4 => 9,
                    5 => 0,
                ],
                'answers' => [
                    3,
                ],
            ],
            [
                'text' => '6 + 6 = ',
                'options' => [
                    1 => 3,
                    2 => 9,
                    3 => 0,
                    4 => 12,
                    5 => '5 + 7',
                ],
                'answers' => [
                    4, 5,
                ],
            ],
            [
                'text' => '7 + 7 = ',
                'options' => [
                    1 => 5,
                    2 => 14,
                ],
                'answers' => [
                    2,
                ],
            ],
            [
                'text' => '8 + 8 = ',
                'options' => [
                    1 => 16,
                    2 => 12,
                    3 => 9,
                    4 => 5,
                ],
                'answers' => [
                    1,
                ],
            ],
            [
                'text' => '9 + 9 = ',
                'options' => [
                    1 => 18,
                    2 => 9,
                    3 => '17 + 1',
                    4 => '2 + 16',
                ],
                'answers' => [
                    1, 3, 4,
                ],
            ],
            [
                'text' => '10 + 10 = ',
                'options' => [
                    1 => 0,
                    2 => 2,
                    3 => 8,
                    4 => 20,
                ],
                'answers' => [
                    4,
                ],
            ],
        ];

        foreach ($rawData as $data) {
            $question = new Question();
            $question->setText($data['text']);
            $question->setOptions($data['options']);
            $question->setAnswers($data['answers']);
            $manager->persist($question);
        }

        $manager->flush();
    }
}
