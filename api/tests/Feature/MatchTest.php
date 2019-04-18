<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMatch()
    {
        $payload = [
            'match_name' => 'IPL',
            'first_team' => "1",
            'second_team' => "2",
            'match_date' => "2018-10-31",
        ];
        $this->json('post', '/api/match', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'match_name',
                    'first_team',
                    'second_team',
                    'match_date',
                    'updated_at',
                    'created_at',
                ],
            ]);;
    }


    public function updateMatchWinner()
    {
        $payload = [
            'winning_team' => 1,
            'id' => 7,
        ];
        $this->json('put', '/api/match/7/points', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'match_name',
                    'first_team',
                    'second_team',
                    'match_date',
                    'updated_at',
                    'created_at',
                ],
            ]);;
    }
}