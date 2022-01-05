<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BornAct extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'act_nai3';
    use HasFactory;
}
