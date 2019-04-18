<?php

use Illuminate\Database\Seeder;

class PointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('points')->insert([
            'team_id' => 1,
            'points' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('points')->insert([
            'team_id' => 2,
            'points' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
