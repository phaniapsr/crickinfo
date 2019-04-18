<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTeams()
    {
        $response = $this->get('/teams');
        $response->assertStatus(200);
    }

    public function testGetTeamPlayers(){
        $response = $this->get('/teams/1/players');
        $response->assertStatus(200);
    }


}
