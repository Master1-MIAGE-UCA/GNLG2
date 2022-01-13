<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'act_params';
    use HasFactory;
}
