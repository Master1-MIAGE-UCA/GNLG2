<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiverAct extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'act_div3';
    use HasFactory;
}
