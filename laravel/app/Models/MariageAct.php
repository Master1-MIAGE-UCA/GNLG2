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
    protected $fillable = [
        'BIDON',         
   
        'CODCOM',
        'COMMUNE',
        'CODDEP',
        'DEPART',
        'TYPACT',
        'DATETXT',
        'DREPUB',
        'COTE',
        'LIBRE',
        'NOM',
        'PRE',
        'ORI',
        'DNAIS',
        'AGE',
        'PRO',
        'EXCON',
        'EXC_PRE',
        'EXC_COM',
        'COM',
        'P_NOM',
        'P_PRE',
        'P_COM',
        'P_PRO',
        'M_NOM',
        'M_PRE',
        'M_COM',
        'M_PRO',
        'C_NOM',
        'C_PRE',
        'C_COM',
        'C_PRO',
        'C_ORI',
        'C_DNAIS',
        'C_EXCON',
        'C_X_PRE',
        'C_X_COM',
        'CP_PRE',
        'CP_NOM',
        'CP_PRO',
       
        'CP_COM',
        'CM_PRE',
        'CM_NOM',
        'CM_PRO',
       
        'CM_COM',
        'T1_NOM',


        'T1_PRE',
        'T1_COM',
        'T2_NOM',
        'T2_PRE',
        'T2_COM',
        'T3_NOM',
        'T3_PRE',
        'T3_COM',
        'T4_NOM',
        'T4_PRE',
        'T4_COM' ,
      

        'COMGEN',
        'IDNIM',
        'PHOTOS',
        'LADATE',
        'ID',
        'DEPOSANT',
        'PHOTOGRA',
        'RELEVEUR',
        'VERIFIEU',
        'DTDEPOT',
        'DTMODIF',
    ];
}
