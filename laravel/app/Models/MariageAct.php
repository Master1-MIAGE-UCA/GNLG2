<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MariageAct extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'act_mar3';
    use HasFactory;
}
