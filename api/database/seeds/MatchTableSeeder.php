<?php

use Illuminate\Database\Seeder;

class MatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('matches')->insert([
            'match_name' => 'League Match',
            'first_team' => 1,
            'second_team' => 2,
            'winning_team' => 1,
            'match_date' => '2019-04-10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('matches')->insert([
            'match_name' => 'League Match',
            'first_team' => 1,
            'second_team' => 2,
            'winning_team' => 2,
            'match_date' => '2019-04-12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
