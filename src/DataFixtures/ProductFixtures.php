<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public const KEYBOARDS = [
        [
            'name' => 'Asus ROG Strix Scope TKL',
            'poster' => 'ARogStrix.jpg',
            'price' => '109,99',
            'category' => 'category_Claviers'
        ],
        [
            'name' => 'Asus ROG Strix Scope RX',
            'poster' => 'ARogStrixScope.jpg',
            'price' => '149',
            'category' => 'category_Claviers'
        ],
        [
            'name' => 'Magic Keyboard',
            'poster' => 'MagicKeyboard.jpg',
            'price' => '109',
            'category' => 'category_Claviers'
        ],
        [
            'name' => 'K100 Corsair',
            'poster' => 'K100.jpg',
            'price' => '329,25',
            'category' => 'category_Claviers'
        ],
        [
            'name' => 'Ducky Channel One 2 Mini RGB',
            'poster' => 'Ducky.jpg',
            'price' => '119.95',
            'category' => 'category_Claviers'
        ]
    ];

    public const GPUS = [
        [
            'name' => 'RTX 3060',
            'poster' => '3060.jpg',
            'price' => '449,95',
            'category' => 'category_Cartes graphique'
        ],
        [
            'name' => 'RTX 4070ti',
            'poster' => '4070ti.jpg',
            'price' => '1099.94',
            'category' => 'category_Cartes graphique'
        ],
        [
            'name' => 'RTX 4080',
            'poster' => '4080.jpg',
            'price' => '1799.95',
            'category' => 'category_Cartes graphique'
        ],
        [
            'name' => 'RTX 4080',
            'poster' => '4080W.jpg',
            'price' => '1799.95',
            'category' => 'category_Cartes graphique'
        ],
        [
            'name' => 'RTX 4090',
            'poster' => '4090.jpg',
            'price' => '2149.96',
            'category' => 'category_Cartes graphique'
        ]
    ];

    public const SCREENS = [
        [
            'name' => 'Iiyama ProLite XU2492HSU-B1',
            'poster' => 'Iiyama.jpg',
            'price' => 159.95,
            'category' => 'category_Ecrans'
        ],
        [
            'name' => 'AOC 24B1H',
            'poster' => 'aoc.jpg',
            'price' => 119.95,
            'category' => 'category_Ecrans'
        ],
        [
            'name' => 'AOC C27G2ZU',
            'poster' => 'AOCG.jpg',
            'price' => 279.95,
            'category' => 'category_Ecrans'
        ],
        [
            'name' => 'Fox Spirit PGM340 V2',
            'poster' => 'foxspirit.jpg',
            'price' => 434.95,
            'category' => 'category_Ecrans'
        ],
        [
            'name' => 'MSI Optix MAG281URF',
            'poster' => 'msi.jpg',
            'price' => 599.95,
            'category' => 'category_Ecrans'
        ]
    ];

        public const LAPTOPS = [
        [
            'name' => 'Macbook air M1 pro',
            'poster' => 'macbookairpro.jpg',
            'price' => 2134,
            'category' => 'category_Pc portables'
        ],
        [
            'name' => 'MSI GF63 Thin ',
            'poster' => 'MSIGF63.jpg',
            'price' => 799.96,
            'category' => 'category_Pc portables'
        ],
        [
            'name' => 'Asus R515EA',
            'poster' => 'asusR515.jpg',
            'price' => 599.95,
            'category' => 'category_Pc portables'
        ],
        [
            'name' => 'Macbook air m2',
            'poster' => 'macbookairm2.jpg',
            'price' => 2079,
            'category' => 'category_Pc portables'
        ],
        [
            'name' => 'Dell Inspiron',
            'poster' => 'dellinspi.jpg',
            'price' => 1199.95,
            'category' => 'category_Pc portables'
        ]
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::KEYBOARDS as $key => $keyboard) {
            $product = new Product();
            $product->setName($keyboard['name']);
            $product->setPicture($keyboard['poster']);
            $product->setPrice(floatval($keyboard['price']));
            $product->setCategory($this->getReference($keyboard["category"]));
            $manager->persist($product);
            $this->addReference('product_' . $key, $product);
        }

        foreach (self::GPUS as $gpu) {
            $product = new Product();
            $product->setName($gpu['name']);
            $product->setPicture($gpu['poster']);
            $product->setPrice(floatval($gpu['price']));
            $product->setCategory($this->getReference($gpu["category"]));
            $manager->persist($product);
        }

        foreach (self::SCREENS as $screen) {
            $product = new Product();
            $product->setName($screen['name']);
            $product->setPicture($screen['poster']);
            $product->setPrice(floatval($screen['price']));
            $product->setCategory($this->getReference($screen["category"]));
            $manager->persist($product);
        }

        foreach (self::LAPTOPS as $laptop) {
            $product = new Product();
            $product->setName($laptop['name']);
            $product->setPicture($laptop['poster']);
            $product->setPrice(floatval($laptop['price']));
            $product->setCategory($this->getReference($laptop["category"]));
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
