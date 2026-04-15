<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Format: [Kategoria, Nazwa, Ilość, Min, Średnia, OK]
        $itemsData = [
            ['Baterie', 'Bateria płaska 2032', 18, 3, 5, 10],
            ['Bębny', 'Bębny do Brother DCP-L2540DN', 5, 2, 3, 5],
            ['Drukarki', 'Brother DCP-195C', 1, 0, 0, 1],
            ['Drukarki', 'DCP-L2540DN', 3, 0, 0, 1],
            ['Dyski', 'Dyski Serwerowe', 13, 5, 6, 10],
            ['Dyski', 'Dyski komputerowe', 12, 1, 5, 8],
            ['Kable', 'Kable VGA-VGA', 71, 6, 15, 25],
            ['Kable', 'Kable zasilające', 127, 8, 20, 30],
            ['Kable', 'Kable sieciowe', 130, 1, 10, 20],
            ['Karty graficzne', 'Zotac GT630 2GB', 2, 0, 1, 3],
            ['Komputery', 'Mocniejsze nowe PC', 2, 1, 4, 6],
        ];

        foreach ($itemsData as $data) {
            $item = new Item();
            $item->setCategory($data[0]);
            $item->setName($data[1]);
            $item->setQuantity($data[2]);
            $item->setMinLevel($data[3]);
            $item->setMidLevel($data[4]);
            $item->setOkLevel($data[5]);

            $manager->persist($item);
        }

        $manager->flush();
    }
}