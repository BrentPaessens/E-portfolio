<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class BoekingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boekings')->insert(
            [
                [
                    'bought_at' => now(),
                    'aantal_tickets' => 2,
                    'user_id'=> 10
                ],
                [
                    'bought_at' => now(),
                    'aantal_tickets' => 1,
                    'user_id'=> 19
                ],
                [
                    'bought_at' => now(),
                    'aantal_tickets' => 1,
                    'user_id'=> 24
                ],
                [
                    'bought_at' => now(),
                    'aantal_tickets' => 3,
                    'user_id'=> 12
                ],
                [
                    'bought_at' => now(),
                    'aantal_tickets' => 1,
                    'user_id' => 1
                ],
            ]
        );
    }
}
