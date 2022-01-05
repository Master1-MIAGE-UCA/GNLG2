<?php

namespace App\Library\Services;

use App\Models\Setting;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\User;
use App\Models\BornAct;
use App\Models\DeathAct;
use App\Models\MariageAct;
use App\Models\DiverAct;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Helpindex;
use App\Models\Inventory;
use App\Models\Department;
use App\Models\Sales_item;
use App\Models\Invoicepayment;
use App\Models\Invoiceserviceitem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DbHelperTools
{
    public function getDatasFromTableToArray($tableName)
    {
        $result = DB::select('SELECT * FROM `' . $tableName . '`');
        $result = array_map(function ($value) {
            return (array)$value;
        }, $result);
        return $result;
    }

    /*
    public function manageDepartment($data){
        $id=0;
        if (count($data)>0){
            $row = new Department();
            $id=(isset($data['id']))?$data['id']:0;
            if ($id > 0) {
                $row = Department::find ( $id );
                if(!$row){
                    $row = new Department();
                  }
            }
            if(isset($data['name_en'])){
                $row->name_en = (isset($data['name_en']))?$data['name_en']:null;
            }
            if(isset($data['name_ar'])){
                $row->name_ar = (isset($data['name_ar']))?$data['name_ar']:null;
            }
            $row->sort = (isset($data['sort']))?$data['sort']:1;
            $row->is_active = (isset($data['is_active']))?$data['is_active']:0;
            $row->type = (isset($data['type']))?$data['type']:'medical';
            $row->parent_id = (isset($data['parent_id']))?$data['parent_id']:null;
            $row->save ();
            $id = $row->id;
        }
        return $id;
    }
*/


    public function manageUser($data)
    {
        $id = 0;
        if (count($data) > 0) {
            $row = new User();
           // var_dump($row);die();
            $id = (isset($data['ID'])) ? $data['ID'] : 0;

            if ($id > 0) {
                $row = User::find($id);
                if (!$row) {
                    $row = new User();
                }
            }

        //var_dump($row->ID);die();
            //var_dump(Carbon::now());die();
            $row->prenom = (isset($data['prenom'])) ? $data['prenom'] : null;
            $row->nom = (isset($data['nom'])) ? $data['nom'] : null;
            $row->login = (isset($data['login'])) ? $data['login'] : '';
            if (isset($data['hashpass']) && !empty($data['hashpass'])) {
                $row->hashpass = $data['hashpass']; // On doit utiliser la methode de cryptage de l'ancien system
            }
            $row->email = (isset($data['email'])) ? $data['email'] : '';
            $row->level = (isset($data['level'])) ? $data['level'] : 1;
            $row->statut = (isset($data['statut'])) ? $data['statut'] : 'N';
            $row->dtcreation = (isset($data['dtcreation'])) ? $data['dtcreation'] : Carbon::now();
            $dt = Carbon::createFromFormat('d/m/Y','31/12/2033');
            $row->dtexpiration = (isset($data['dtexpiration'])) ? $data['dtexpiration'] : $dt;
            $row->REM = (isset($data['REM'])) ? $data['REM'] : '';
            $row->libre = (isset($data['libre'])) ? $data['libre'] : '';


            $row->regime = (isset($data['regime'])) ? $data['regime'] : 0;
            $row->solde = (isset($data['solde'])) ? $data['solde'] : 0;
            $row->maj_solde = (isset($data['maj_solde'])) ? $data['maj_solde'] : $dt;//Doit etre une date
            $row->pt_conso = (isset($data['pt_conso'])) ? $data['pt_conso'] : 0;


            //$row->email_verified_at = (isset($data['email_verified_at'])) ? $data['email_verified_at'] : null;
            //$row->remember_token = (isset($data['remember_token'])) ? $data['remember_token'] : null;


            $row->save();
            //var_dump($row);die();
            $id = $row->ID;

        }
        return $id;
    }
    public function manageBornAct($data)
    {
        $id = 0;
        if (count($data) > 0) {
            $row = new BornAct();
           // var_dump($row);die();
            $id = (isset($data['ID'])) ? $data['ID'] : 0;

            if ($data['addOrUpdate']==1) {
                $row = BornAct::find($id);
                if (!$row) {
                    $row = new BornAct();
                    $row->ID=$id;
                }
            }
           else{
               $row->ID=$id;
           }
        //var_dump($row->ID);die();
            //var_dump(Carbon::now());die();

            $row->CODCOM = (isset($data['CODCOM'])) ? $data['CODCOM'] : null;
            $row->COMMUNE = (isset($data['COMMUNE'])) ? $data['COMMUNE'] : null;
            $row->CODDEP = (isset($data['CODDEP'])) ? $data['CODDEP'] : null;
            $row->DEPART = (isset($data['DEPART'])) ? $data['DEPART'] : null;
            $row->NOM = (isset($data['NOM'])) ? $data['NOM'] : null;
            $row->PRE = (isset($data['PRE'])) ? $data['PRE'] : null;
            $row->LADATE = (isset($data['LADATE'])) ? $data['LADATE'] : null;
            $row->SEXE = (isset($data['SEXE'])) ? $data['SEXE'] : null;
            $row->COM = (isset($data['COM'])) ? $data['COM'] : null;
            $row->P_NOM = (isset($data['P_NOM'])) ? $data['P_NOM'] : null;
            $row->P_PRE = (isset($data['P_PRE'])) ? $data['P_PRE'] : null;
            $row->P_PRO = (isset($data['P_PRO'])) ? $data['P_PRO'] : null;
            $row->P_COM = (isset($data['P_COM'])) ? $data['P_COM'] : null;
            $row->M_NOM = (isset($data['M_NOM'])) ? $data['M_NOM'] : null;
            $row->M_PRE = (isset($data['M_PRE'])) ? $data['M_PRE'] : null;
            $row->M_PRO = (isset($data['M_PRO'])) ? $data['M_PRO'] : null;
            $row->M_COM = (isset($data['M_COM'])) ? $data['M_COM'] : null;
            $row->T1_NOM = (isset($data['T1_NOM'])) ? $data['T1_NOM'] : null;
            $row->T1_PRE = (isset($data['T1_PRE'])) ? $data['T1_PRE'] : null;
            $row->T1_COM = (isset($data['T1_COM'])) ? $data['T1_COM'] : null;
            $row->T2_NOM = (isset($data['T2_NOM'])) ? $data['T2_NOM'] : null;
            $row->T2_PRE = (isset($data['T2_PRE'])) ? $data['T2_PRE'] : null;
            $row->T2_COM = (isset($data['T2_COM'])) ? $data['T2_COM'] : null;
            $row->COTE = (isset($data['COTE'])) ? $data['COTE'] : null;
            $row->LIBRE = (isset($data['LIBRE'])) ? $data['LIBRE'] : null;
            $row->COMGEN = (isset($data['COMGEN'])) ? $data['COMGEN'] : null;
            $row->PHOTOS = (isset($data['PHOTOS '])) ? $data['PHOTOS '] : null;
            $row->DEPOSANT = (isset($data['DEPOSANT'])) ? $data['DEPOSANT'] : null;
            $row->PHOTOGRA = (isset($data['PHOTOGRA'])) ? $data['PHOTOGRA'] : null;
            $row->RELEVEUR = (isset($data['RELEVEUR'])) ? $data['RELEVEUR'] : null;
            $row->VERIFIEU = (isset($data['VERIFIEU'])) ? $data['VERIFIEU'] : null;
            $row->DTDEPOT = (isset($data['DTDEPOT'])) ? $data['DTDEPOT'] : null;
            $row->DTMODIF = (isset($data['DTMODIF'])) ? $data['DTMODIF'] : null;


            $row->save();
            //var_dump($row);die();


        }
        return $id;
    }
    public function manageDeathAct($data)
    {
        $id = 0;
        if (count($data) > 0) {
            $row = new DeathAct();
           // var_dump($row);die();
            $id = (isset($data['ID'])) ? $data['ID'] : 0;

            if ($data['addOrUpdate']==1) {
                $row = DeathAct::find($id);
                if (!$row) {
                    $row = new DeathAct();
                    $row->ID=$id;
                }
            }
           else{
               $row->ID=$id;
           }
        //var_dump($row->ID);die();
            //var_dump(Carbon::now());die();

            $row->CODCOM = (isset($data['CODCOM'])) ? $data['CODCOM'] : null;
            $row->COMMUNE = (isset($data['COMMUNE'])) ? $data['COMMUNE'] : null;
            $row->CODDEP = (isset($data['CODDEP'])) ? $data['CODDEP'] : null;
            $row->DEPART = (isset($data['DEPART'])) ? $data['DEPART'] : null;
            $row->NOM = (isset($data['NOM'])) ? $data['NOM'] : null;
            $row->PRE = (isset($data['PRE'])) ? $data['PRE'] : null;
            $row->DATETXT = (isset($data['DATETXT'])) ? $data['DATETXT'] : null;
            $row->LADATE = (isset($data['LADATE'])) ? $data['LADATE'] : null;
            $row->DNAIS = (isset($data['DNAIS'])) ? $data['DNAIS'] : null;
            $row->PRO = (isset($data['PRO'])) ? $data['PRO'] : null;
            $row->AGE = (isset($data['AGE'])) ? $data['AGE'] : null;
            $row->ORI = (isset($data['ORI'])) ? $data['ORI'] : null;
            $row->SEXE = (isset($data['SEXE'])) ? $data['SEXE'] : null;
            $row->COM = (isset($data['COM'])) ? $data['COM'] : null;
            $row->P_NOM = (isset($data['P_NOM'])) ? $data['P_NOM'] : null;
            $row->P_PRE = (isset($data['P_PRE'])) ? $data['P_PRE'] : null;
            $row->P_PRO = (isset($data['P_PRO'])) ? $data['P_PRO'] : null;
            $row->P_COM = (isset($data['P_COM'])) ? $data['P_COM'] : null;
            $row->M_NOM = (isset($data['M_NOM'])) ? $data['M_NOM'] : null;
            $row->M_PRE = (isset($data['M_PRE'])) ? $data['M_PRE'] : null;
            $row->M_PRO = (isset($data['M_PRO'])) ? $data['M_PRO'] : null;
            $row->M_COM = (isset($data['M_COM'])) ? $data['M_COM'] : null;
            $row->C_NOM = (isset($data['C_NOM'])) ? $data['C_NOM'] : null;
            $row->C_PRE = (isset($data['C_PRE'])) ? $data['C_PRE'] : null;
            $row->C_PRO = (isset($data['C_PRO'])) ? $data['C_PRO'] : null;
            $row->C_COM = (isset($data['C_COM'])) ? $data['C_COM'] : null;
            $row->T1_NOM = (isset($data['T1_NOM'])) ? $data['T1_NOM'] : null;
            $row->T1_PRE = (isset($data['T1_PRE'])) ? $data['T1_PRE'] : null;
            $row->T1_COM = (isset($data['T1_COM'])) ? $data['T1_COM'] : null;
            $row->T2_NOM = (isset($data['T2_NOM'])) ? $data['T2_NOM'] : null;
            $row->T2_PRE = (isset($data['T2_PRE'])) ? $data['T2_PRE'] : null;
            $row->T2_COM = (isset($data['T2_COM'])) ? $data['T2_COM'] : null;
            $row->COTE = (isset($data['COTE'])) ? $data['COTE'] : null;
            $row->LIBRE = (isset($data['LIBRE'])) ? $data['LIBRE'] : null;
            $row->COMGEN = (isset($data['COMGEN'])) ? $data['COMGEN'] : null;
            $row->PHOTOS = (isset($data['PHOTOS '])) ? $data['PHOTOS '] : null;
            $row->DEPOSANT = (isset($data['DEPOSANT'])) ? $data['DEPOSANT'] : null;
            $row->PHOTOGRA = (isset($data['PHOTOGRA'])) ? $data['PHOTOGRA'] : null;
            $row->RELEVEUR = (isset($data['RELEVEUR'])) ? $data['RELEVEUR'] : null;
            $row->VERIFIEU = (isset($data['VERIFIEU'])) ? $data['VERIFIEU'] : null;
            $row->DTDEPOT = (isset($data['DTDEPOT'])) ? $data['DTDEPOT'] : null;
            $row->DTMODIF = (isset($data['DTMODIF'])) ? $data['DTMODIF'] : null;


            $row->save();
            //var_dump($row);die();


        }
        return $id;
    }
    public function manageMariageAct($data)
    {
        $id = 0;
        if (count($data) > 0) {
            $row = new MariageAct();
           // var_dump($row);die();
            $id = (isset($data['ID'])) ? $data['ID'] : 0;

            if ($id > 0) {
                $row = MariageAct::find($id);
                if (!$row) {
                    $row = new MariageAct();
                }
            }
        //var_dump($row->ID);die();
            //var_dump(Carbon::now());die();

            $row->CODCOM = (isset($data['CODCOM'])) ? $data['CODCOM'] : null;
            $row->COMMUNE = (isset($data['COMMUNE'])) ? $data['COMMUNE'] : null;
            $row->CODDEP = (isset($data['CODDEP'])) ? $data['CODDEP'] : null;
            $row->DEPART = (isset($data['DEPART'])) ? $data['DEPART'] : null;
            $row->NOM = (isset($data['NOM'])) ? $data['NOM'] : null;
            $row->PRE = (isset($data['PRE'])) ? $data['PRE'] : null;
            $row->DATETXT = (isset($data['DATETXT'])) ? $data['DATETXT'] : null;
            $row->LADATE = (isset($data['LADATE'])) ? $data['LADATE'] : null;
            $row->DNAIS = (isset($data['DNAIS'])) ? $data['DNAIS'] : null;
            $row->PRO = (isset($data['PRO'])) ? $data['PRO'] : null;
            $row->AGE = (isset($data['AGE'])) ? $data['AGE'] : null;
            $row->ORI = (isset($data['ORI'])) ? $data['ORI'] : null;
            $row->COM = (isset($data['COM'])) ? $data['COM'] : null;
            $row->P_NOM = (isset($data['P_NOM'])) ? $data['P_NOM'] : null;
            $row->P_PRE = (isset($data['P_PRE'])) ? $data['P_PRE'] : null;
            $row->P_PRO = (isset($data['P_PRO'])) ? $data['P_PRO'] : null;
            $row->P_COM = (isset($data['P_COM'])) ? $data['P_COM'] : null;
            $row->CP_NOM = (isset($data['CP_NOM'])) ? $data['CP_NOM'] : null;
            $row->CP_PRE = (isset($data['CP_PRE'])) ? $data['CP_PRE'] : null;
            $row->CP_PRO = (isset($data['CP_PRO'])) ? $data['CP_PRO'] : null;
            $row->CP_COM = (isset($data['CP_COM'])) ? $data['CP_COM'] : null;
            $row->M_NOM = (isset($data['M_NOM'])) ? $data['M_NOM'] : null;
            $row->M_PRE = (isset($data['M_PRE'])) ? $data['M_PRE'] : null;
            $row->M_PRO = (isset($data['M_PRO'])) ? $data['M_PRO'] : null;
            $row->M_COM = (isset($data['M_COM'])) ? $data['M_COM'] : null;
            $row->CM_NOM = (isset($data['CM_NOM'])) ? $data['CM_NOM'] : null;
            $row->CM_PRE = (isset($data['CM_PRE'])) ? $data['CM_PRE'] : null;
            $row->CM_PRO = (isset($data['CM_PRO'])) ? $data['CM_PRO'] : null;
            $row->CM_COM = (isset($data['CM_COM'])) ? $data['CM_COM'] : null;
            $row->C_NOM = (isset($data['C_NOM'])) ? $data['C_NOM'] : null;
            $row->C_PRE = (isset($data['C_PRE'])) ? $data['C_PRE'] : null;
            $row->C_PRO = (isset($data['C_PRO'])) ? $data['C_PRO'] : null;
            $row->C_COM = (isset($data['C_COM'])) ? $data['C_COM'] : null;
            $row->C_ORI = (isset($data['C_ORI'])) ? $data['C_ORI'] : null;
            $row->C_DNAIS= (isset($data['C_DNAIS'])) ? $data['C_DNAIS'] : null;
            $row->C_AGE = (isset($data['C_AGE'])) ? $data['C_AGE'] : null;
            $row->C_EXCON= (isset($data['C_EXCON'])) ? $data['C_EXCON'] : null;
            $row->EXCON = (isset($data['EXCON'])) ? $data['EXCON'] : null;
            $row->C_X_COM = (isset($data['C_X_COM'])) ? $data['C_X_COM'] : null;
            $row->T1_NOM = (isset($data['T1_NOM'])) ? $data['T1_NOM'] : null;
            $row->T1_PRE = (isset($data['T1_PRE'])) ? $data['T1_PRE'] : null;
            $row->T1_COM = (isset($data['T1_COM'])) ? $data['T1_COM'] : null;
            $row->T2_NOM = (isset($data['T2_NOM'])) ? $data['T2_NOM'] : null;
            $row->T2_PRE = (isset($data['T2_PRE'])) ? $data['T2_PRE'] : null;
            $row->T2_COM = (isset($data['T2_COM'])) ? $data['T2_COM'] : null;
            $row->T3_NOM = (isset($data['T3_NOM'])) ? $data['T3_NOM'] : null;
            $row->T3_PRE = (isset($data['T3_PRE'])) ? $data['T3_PRE'] : null;
            $row->T3_COM = (isset($data['T3_COM'])) ? $data['T3_COM'] : null;
            $row->T4_NOM = (isset($data['T4_NOM'])) ? $data['T4_NOM'] : null;
            $row->T4_PRE = (isset($data['T4_PRE'])) ? $data['T4_PRE'] : null;
            $row->T4_COM = (isset($data['T4_COM'])) ? $data['T4_COM'] : null;
            $row->COTE = (isset($data['COTE'])) ? $data['COTE'] : null;
            $row->LIBRE = (isset($data['LIBRE'])) ? $data['LIBRE'] : null;
            $row->COMGEN = (isset($data['COMGEN'])) ? $data['COMGEN'] : null;
            $row->PHOTOS = (isset($data['PHOTOS '])) ? $data['PHOTOS '] : null;
            $row->DEPOSANT = (isset($data['DEPOSANT'])) ? $data['DEPOSANT'] : null;
            $row->PHOTOGRA = (isset($data['PHOTOGRA'])) ? $data['PHOTOGRA'] : null;
            $row->RELEVEUR = (isset($data['RELEVEUR'])) ? $data['RELEVEUR'] : null;
            $row->VERIFIEU = (isset($data['VERIFIEU'])) ? $data['VERIFIEU'] : null;
            $row->DTDEPOT = (isset($data['DTDEPOT'])) ? $data['DTDEPOT'] : null;
            $row->DTMODIF = (isset($data['DTMODIF'])) ? $data['DTMODIF'] : null;


            $row->save();
            //var_dump($row);die();
            $id = $row->ID;

        }
        return $id;
    }
    public function manageDiversAct($data)
    {
        $id = 0;
        if (count($data) > 0) {
            $row = new DiverAct();
           // var_dump($row);die();
            $id = (isset($data['ID'])) ? $data['ID'] : 0;

            if ($id > 0) {
                $row = DiverAct::find($id);
                if (!$row) {
                    $row = new DiverAct();
                }
            }
        //var_dump($row->ID);die();
            //var_dump(Carbon::now());die();

            $row->CODCOM = (isset($data['CODCOM'])) ? $data['CODCOM'] : null;
            $row->COMMUNE = (isset($data['COMMUNE'])) ? $data['COMMUNE'] : null;
            $row->CODDEP = (isset($data['CODDEP'])) ? $data['CODDEP'] : null;
            $row->DEPART = (isset($data['DEPART'])) ? $data['DEPART'] : null;
            $row->NOM = (isset($data['NOM'])) ? $data['NOM'] : null;
            $row->PRE = (isset($data['PRE'])) ? $data['PRE'] : null;
            $row->DATETXT = (isset($data['DATETXT'])) ? $data['DATETXT'] : null;
            $row->LADATE = (isset($data['LADATE'])) ? $data['LADATE'] : null;
            $row->DNAIS = (isset($data['DNAIS'])) ? $data['DNAIS'] : null;
            $row->PRO = (isset($data['PRO'])) ? $data['PRO'] : null;
            $row->AGE = (isset($data['AGE'])) ? $data['AGE'] : null;
            $row->ORI = (isset($data['ORI'])) ? $data['ORI'] : null;
            $row->COM = (isset($data['COM'])) ? $data['COM'] : null;
            $row->P_NOM = (isset($data['P_NOM'])) ? $data['P_NOM'] : null;
            $row->P_PRE = (isset($data['P_PRE'])) ? $data['P_PRE'] : null;
            $row->P_PRO = (isset($data['P_PRO'])) ? $data['P_PRO'] : null;
            $row->P_COM = (isset($data['P_COM'])) ? $data['P_COM'] : null;
            $row->CP_NOM = (isset($data['CP_NOM'])) ? $data['CP_NOM'] : null;
            $row->CP_PRE = (isset($data['CP_PRE'])) ? $data['CP_PRE'] : null;
            $row->CP_PRO = (isset($data['CP_PRO'])) ? $data['CP_PRO'] : null;
            $row->CP_COM = (isset($data['CP_COM'])) ? $data['CP_COM'] : null;
            $row->M_NOM = (isset($data['M_NOM'])) ? $data['M_NOM'] : null;
            $row->M_PRE = (isset($data['M_PRE'])) ? $data['M_PRE'] : null;
            $row->M_PRO = (isset($data['M_PRO'])) ? $data['M_PRO'] : null;
            $row->M_COM = (isset($data['M_COM'])) ? $data['M_COM'] : null;
            $row->CM_NOM = (isset($data['CM_NOM'])) ? $data['CM_NOM'] : null;
            $row->CM_PRE = (isset($data['CM_PRE'])) ? $data['CM_PRE'] : null;
            $row->CM_PRO = (isset($data['CM_PRO'])) ? $data['CM_PRO'] : null;
            $row->CM_COM = (isset($data['CM_COM'])) ? $data['CM_COM'] : null;
            $row->C_NOM = (isset($data['C_NOM'])) ? $data['C_NOM'] : null;
            $row->C_PRE = (isset($data['C_PRE'])) ? $data['C_PRE'] : null;
            $row->C_PRO = (isset($data['C_PRO'])) ? $data['C_PRO'] : null;
            $row->C_COM = (isset($data['C_COM'])) ? $data['C_COM'] : null;
            $row->C_ORI = (isset($data['C_ORI'])) ? $data['C_ORI'] : null;
            $row->C_DNAIS= (isset($data['C_DNAIS'])) ? $data['C_DNAIS'] : null;
            $row->C_AGE = (isset($data['C_AGE'])) ? $data['C_AGE'] : null;
            $row->C_EXCON= (isset($data['C_EXCON'])) ? $data['C_EXCON'] : null;
            $row->EXCON = (isset($data['EXCON'])) ? $data['EXCON'] : null;
            $row->C_X_COM = (isset($data['C_X_COM'])) ? $data['C_X_COM'] : null;
            $row->T1_NOM = (isset($data['T1_NOM'])) ? $data['T1_NOM'] : null;
            $row->T1_PRE = (isset($data['T1_PRE'])) ? $data['T1_PRE'] : null;
            $row->T1_COM = (isset($data['T1_COM'])) ? $data['T1_COM'] : null;
            $row->T2_NOM = (isset($data['T2_NOM'])) ? $data['T2_NOM'] : null;
            $row->T2_PRE = (isset($data['T2_PRE'])) ? $data['T2_PRE'] : null;
            $row->T2_COM = (isset($data['T2_COM'])) ? $data['T2_COM'] : null;
            $row->T3_NOM = (isset($data['T3_NOM'])) ? $data['T3_NOM'] : null;
            $row->T3_PRE = (isset($data['T3_PRE'])) ? $data['T3_PRE'] : null;
            $row->T3_COM = (isset($data['T3_COM'])) ? $data['T3_COM'] : null;
            $row->T4_NOM = (isset($data['T4_NOM'])) ? $data['T4_NOM'] : null;
            $row->T4_PRE = (isset($data['T4_PRE'])) ? $data['T4_PRE'] : null;
            $row->T4_COM = (isset($data['T4_COM'])) ? $data['T4_COM'] : null;
            $row->COTE = (isset($data['COTE'])) ? $data['COTE'] : null;
            $row->LIBRE = (isset($data['LIBRE'])) ? $data['LIBRE'] : null;
            $row->COMGEN = (isset($data['COMGEN'])) ? $data['COMGEN'] : null;
            $row->PHOTOS = (isset($data['PHOTOS '])) ? $data['PHOTOS '] : null;
            $row->DEPOSANT = (isset($data['DEPOSANT'])) ? $data['DEPOSANT'] : null;
            $row->PHOTOGRA = (isset($data['PHOTOGRA'])) ? $data['PHOTOGRA'] : null;
            $row->RELEVEUR = (isset($data['RELEVEUR'])) ? $data['RELEVEUR'] : null;
            $row->VERIFIEU = (isset($data['VERIFIEU'])) ? $data['VERIFIEU'] : null;
            $row->DTDEPOT = (isset($data['DTDEPOT'])) ? $data['DTDEPOT'] : null;
            $row->DTMODIF = (isset($data['DTMODIF'])) ? $data['DTMODIF'] : null;


            $row->save();
            //var_dump($row);die();
            $id = $row->ID;

        }
        return $id;
    }
}
