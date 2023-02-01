<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectedStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'elected_id';

    protected $fillable = [
        'candidate_id',
        'election_id',
        'hosd_approval',
        'coo_approval'
    ];
}
