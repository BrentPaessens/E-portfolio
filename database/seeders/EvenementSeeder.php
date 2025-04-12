<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evenements')->insert(
            [
                [
                    'naam' => 'Graspop',
                    'locatie' => 'Dessel',
                    'prijs' => 119.00,
                    'stock' => 220000,
                    'genre_id'=> 4,
                ],
                [
                    'naam' => 'Tomorrowland',
                    'locatie' => 'Boom',
                    'prijs' => 365.00,
                    'stock' => 400000,
                    'genre_id'=> 13
                ],
                [
                    'naam' => 'Rock Werchter',
                    'locatie' => 'Werchter ',
                    'prijs' => 134.00,
                    'stock' => 88000,
                    'genre_id'=> 1
                ],
                [
                    'naam' => 'Pukkelpop',
                    'locatie' => 'Kiewit',
                    'prijs' => 125.00,
                    'stock' => 66000,
                    'genre_id'=> 16
                ],
                [
                    'naam' => 'Dour',
                    'locatie' => 'Dour',
                    'prijs' => 70.00,
                    'stock' => 140000,
                    'genre_id' => 1
                ],
                [
                    'naam' => 'TW Classic',
                    'locatie' => 'Werchter',
                    'prijs' => 133.00,
                    'stock' => 12000,
                    'genre_id' => 11
                ],
                [
                    'naam' => 'Suikerrock',
                    'locatie' => 'Tienen',
                    'prijs' => 60.00,
                    'stock' => 90000,
                    'genre_id' => 16
                ],
                [
                    'naam' => 'Les Ardentes',
                    'locatie' => 'Luik',
                    'prijs' => 110.00,
                    'stock' => 200000,
                    'genre_id' => 13
                ],
                [
                    'naam' => 'Lokerse Feesten',
                    'locatie' => 'Lokeren',
                    'prijs' => 55.00,
                    'stock' => 135000,
                    'genre_id'=> 18
                ],
                [
                    'naam' => 'Rampage Open Air',
                    'locatie' => 'Lommel',
                    'prijs' => 62.00,
                    'stock' => 30000,
                    'genre_id'=> 19
                ],
                [
                    'naam' => 'Couleur Café',
                    'locatie' => 'Brussel',
                    'prijs' => 100.00,
                    'stock' => 70000,
                    'genre_id' => 16
                ],
                [
                    'naam' => 'Alcatraz Festival',
                    'locatie' => 'Kortrijk',
                    'prijs' => 175.00,
                    'stock' => 55000,
                    'genre_id' => 18
                ],
            ]
        );
    }
}
