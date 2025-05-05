<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setName('Product one');
        $product->setDescription('This Is Product One Description');
        $product->setSize(100);

        $manager->persist($product);

        $product = new Product();

        $product->setName('Product two');
        $product->setDescription('This Is Product Two Description');
        $product->setSize(100);

        $manager->persist($product);


        $manager->flush();
    }
}
