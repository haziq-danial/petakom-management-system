<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteDay extends Model
{
    protected $table = 'vote_day';
    protected $primaryKey = 'id';
    protected $dates = [
        'VOTE_DATE',
        'VOTE_STARTTIME',
        'VOTE_ENDTIME'
    ];


    protected $fillable = ['VOTE_DATE',  'VOTE_STARTTIME', 'VOTE_ENDTIME'];
}
