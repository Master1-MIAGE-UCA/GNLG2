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
    protected $fillable = [
        'BIDON',         
   
            'CODCOM' ,
            'COMMUNE',
            'CODDEP' ,
            'DEPART',
            'TYPACT' ,
            'DATETXT',
            'DREPUB' ,
            'COTE' ,
            'LIBRE',
            'NOM',
            'PRE',
            'SEXE',
            'COM' ,
            'P_NOM',
            'P_PRE' ,
            'P_COM',
            'P_PRO',
            'M_NOM' ,
            'M_PRE' ,
            'M_COM',
            'M_PRO',
            'T1_NOM',
            'T1_PRE' ,
            'T1_COM',
            'T2_NOM',
            'T2_PRE',
            'T2_COM' ,
          

            'COMGEN' ,
            'IDNIM',
            'PHOTOS',
            'LADATE',
            'ID' ,
            'DEPOSANT',
            'PHOTOGRA',
            'RELEVEUR',
            'VERIFIEU',
            'DTDEPOT',
            'DTMODIF',
    ];
}
