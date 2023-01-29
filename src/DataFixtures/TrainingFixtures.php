<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrainingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 5; $i++) {
            $training = new Training();
            $training
                ->setYear("Year $i")
                ->setSchool("School $i")
                ->setDomain("Domain $i")
                ->setDegree("Degree $i")
                ;
            $manager->persist($training);
        }

        $manager->flush();
    }
}
