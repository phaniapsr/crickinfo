<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams')->insert([
            'name' => 'CHENNAI SUPER KINGS',
            'logo_uri' => 'csk.jpg',
            'club_state' => 'Chennai',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('teams')->insert([
            'name' => 'DELHI CAPITALS STATS',
            'logo_uri' => 'delhi.jpg',
            'club_state' => 'Delhi club',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('teams')->insert([
            'name' => 'Kings XI Punjab',
            'logo_uri' => 'kxip.jpg',
            'club_state' => 'Punjab',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('teams')->insert([
            'name' => 'Kolkata Knight Riders',
            'logo_uri' => 'kkr.jpg',
            'club_state' => 'Kolkata',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
