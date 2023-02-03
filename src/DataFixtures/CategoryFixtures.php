<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            'name' => 'Claviers',
            'poster' => 'ARogStrix.jpg'
        ],
        [
            'name' => 'Cartes graphique',
            'poster' => '3060.jpg'
        ],
        [
            'name' => 'Ecrans',
            'poster' => 'Iiyama.jpg'
        ],
        [
            'name' => 'Pc portables',
            'poster' => 'macbookairpro.jpg'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $categoryName) {
            $category = new Category();
            $category->setName($categoryName['name']);
            $category->setPoster($categoryName['poster']);
            $manager->persist($category);
            $this->addReference('category_' . $categoryName['name'], $category);
        }
        $manager->flush();
    }
}
