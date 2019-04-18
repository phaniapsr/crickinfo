<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('players')->insert([
            'first_name' => 'Dhoni',
            'last_name' => 'MS',
            'image_uri' => 'dhoni.jpg',
            'player_jersey_number' => 1,
            'country' => 'India',
            'matches' =>10,
            'runs' => 300,
            'height_score' => 80,
            'fifties' => 2,
            'hundreds' => 0,
            'team_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('players')->insert([
            'first_name' => 'Asif',
            'last_name' => 'KM',
            'image_uri' => 'asif.jpg',
            'player_jersey_number' => 2,
            'country' => 'India',
            'matches' =>10,
            'runs' => 350,
            'height_score' => 85,
            'fifties' => 2,
            'hundreds' => 0,
            'team_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('players')->insert([
            'first_name' => 'Billings',
            'last_name' => 'SAM',
            'image_uri' => 'billings.jpg',
            'player_jersey_number' => 3,
            'country' => 'Australia',
            'matches' =>10,
            'runs' => 250,
            'height_score' => 78,
            'fifties' => 3,
            'hundreds' => 0,
            'team_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('players')->insert([
            'first_name' => 'Iyer',
            'last_name' => 'Shyeras',
            'image_uri' => 'iyer.jpg',
            'player_jersey_number' => 1,
            'country' => 'India',
            'matches' =>10,
            'runs' => 255,
            'height_score' => 60,
            'fifties' => 2,
            'hundreds' => 0,
            'team_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('players')->insert([
            'first_name' => 'Avesh',
            'last_name' => 'Khan',
            'image_uri' => 'avesh.jpg',
            'player_jersey_number' => 2,
            'country' => 'India',
            'matches' =>10,
            'runs' => 120,
            'height_score' => 50,
            'fifties' => 1,
            'hundreds' => 0,
            'team_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('players')->insert([
            'first_name' => 'Bandaru',
            'last_name' => 'Ayyappa',
            'image_uri' => 'ayyappa.jpg',
            'player_jersey_number' => 3,
            'country' => 'India',
            'matches' =>10,
            'runs' => 250,
            'height_score' => 78,
            'fifties' => 3,
            'hundreds' => 0,
            'team_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
