<?php

namespace App\Http\Controllers;

use App\Team;
use App\Http\Resources\TeamCollection;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Get all team from the DB
     * @return TeamCollection $collection or collections
     * @internal param Request $request
     * @internal param $id
     */
    public function getTeams(){
    	return new TeamCollection(Team::all());
    }

    /**
     * Get all players from the DB for a team
     * @return TeamCollection $collection or collections
     * @internal param Request $request
     * @internal param $id
     */
    public function getPlayers($id,Request $request){
        return new TeamCollection(Team::find($id)->players);
    }
}