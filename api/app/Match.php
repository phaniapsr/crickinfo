<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['match_name','first_team','second_team','winning_team','match_date'];
}