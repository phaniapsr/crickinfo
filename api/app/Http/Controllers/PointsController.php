<?php
namespace App\Http\Controllers;

use App\Http\Resources\PointsCollection;
use App\Points;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    /**
     * Get all points for each team from the DB
     * @return PointsCollection $collection or collections
     * @internal param Request $request
     * @internal param $id
     */
    public function getPoints(){
        return new PointsCollection(Points::all());
    }
}
