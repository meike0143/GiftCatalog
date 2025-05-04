<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gift;

class GiftSeeder extends Seeder
{
    private $data = [
        [
            'name' => 'Apple Pie',
            'slug' => 'apple_pie',
            'description' => 'A delicious apple pie, freshly baked.',
            'price' => '10',
            'brand' => 'Hema'
        ],
        [
            'name' => 'Vase with smiley',
            'slug' => 'vase_with_smiley',
            'description' => 'A vase with a smiley on both sides, one being happy and the other side being unhappy.',
            'price' => '7.50',
            'brand' => 'Ikea'
        ],[
            'name' => 'Small leather bag',
            'slug' => 'small_leather_bag',
            'description' => 'A small leather bag, preferably blue.',
            'price' => '35',
            'brand' => 'Duifhuizen'
        ],[
            'name' => 'Two roses',
            'slug' => 'two_roses',
            'description' => 'Two roses that can be made out of legos.',
            'price' => '15',
            'brand' => 'Lego'
        ],[
            'name' => 'Colored pencils',
            'slug' => 'colored_pencils',
            'description' => 'Colored pencils to be able to write in different colors depending on the pencil i pick.',
            'price' => '30',
            'brand' => 'Stabilo'
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $giftData) {
            // create the new gift in the database
            $gift = Gift::create($giftData);
        }
    }
}
