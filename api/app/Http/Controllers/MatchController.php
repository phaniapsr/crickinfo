<?php

namespace App\Http\Controllers;

use App\Http\Resources\Match;
use App\Match as MatchModel;
use App\Http\Resources\MatchCollection;
use App\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    /**
     * Get all matches from the DB
     * @return MatchCollection $collection or collections
     * @internal param Request $request
     * @internal param $id
     */
    public function getMatches(){
        Log::info('Fetching matches');
        return (new MatchCollection(MatchModel::all()));
    }

    /**
     * Create matches schedule
     * @param Request $request
     * @return \App\Http\Resources\Match
     */
    public function createMatch(Request $request){
        Log::debug('createMatch started and validating input data');
        $validator = Validator::make($request->all(), [
            'match_name' => 'required|max:255',
            'first_team' => 'required|integer',
            'second_team' => 'required|integer',
            'match_date' =>'required|date_format:Y-m-d'
        ]);
        if ($validator->fails()) {
            Log::debug($validator->messages());
            return response()->json($validator->messages(), 200);
        }
        if($request->get('first_team')==$request->get('second_team')){
            // Responding with bad request status
            Log::debug('First team and Second team should not be same');
            return response()->json(['First team and Second team should not be same'], 401);
        }
        $match = MatchModel::create($request->all());
        Log::debug('created match record');
        return new \App\Http\Resources\Match($match);
    }

    /**
     * Update Match table
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return Match
     */
    public function updateMatch($id,Request $request){
        Log::debug('updateMatch started and validating input data');
        $validator = Validator::make($request->all(), [
            'match_name' => 'required|max:255',
            'first_team' => 'required|integer',
            'second_team' => 'required|integer',
            'match_date' =>'required|date_format:Y-m-d'
        ]);
        if ($validator->fails()) {
            Log::debug($validator->messages());
            return response()->json($validator->messages(), 200);
        }
        if($request->get('first_team')==$request->get('second_team')){
            // Responding with bad request status
            Log::debug('First team and Second team should not be same');
            return response()->json(['First team and Second team should not be same'], 401);
        }
        $match = MatchModel::findOrFail($id);
        $match->match_name = $request->get('match_name');
        $match->first_team = $request->get('first_team');
        $match->second_team = $request->get('second_team');
        $match->match_date = $request->get('match_date');
        $match->save();
        Log::debug('updateMatch completed successfully');
        return new Match($match);
    }

    /**
     * Update winning team in Match table and add/update points in points table
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return Match
     */
    public function updateWiningTeam($id,Request $request){
        Log::debug('updateWiningTeam started and validating input data '.$id);
        Log::debug($request->all());
        //Validating request from UI (client
        $validator = Validator::make($request->all(), [
            'winning_team' => 'required|integer',
        ]);
        if ($validator->fails()) {
            Log::debug($validator->messages());
            return response()->json($validator->messages(), 200);
        }

        //Fetching match record
        $match = MatchModel::find($id);

        //Identifying match record contains winning team or not
        $winning_team = $request->get('winning_team');
        if (!($match->first_team == $winning_team || $match->second_team == $winning_team)){
            // Responding with bad request status
            Log::debug('winning team not identified');
            return response()->json(['winning team not identified'], 401);
        }

        //Transaction starts here
        DB::beginTransaction();
        try{
            Log::debug('Transaction started');
            //Update match table
            $match->winning_team=$winning_team;
            $match->save();
            //Update points table
            $points = Points::firstOrCreate(['team_id'=>$winning_team]);
            $points->points += 5;
            $points->save();
            DB::commit();
            Log::debug('Transaction committed');
        }catch (\Exception $e){
            Log::error('Transaction failed');
            DB::rollBack();
        }
        return new Match($match);
    }
}