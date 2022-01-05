<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathAct extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'act_dec3';
    use HasFactory;
}
