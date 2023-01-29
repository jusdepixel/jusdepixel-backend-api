<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 6; $i++) {
            $experience = new Experience();
            $experience
                ->setCompany("Company $i")
                ->setJob("Job $i")
                ->setFromDate("January 200$i")
                ->setToDate("December 200$i")
                ->setMission("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
                ;
            $manager->persist($experience);
        }

        $manager->flush();
    }
}
