<?php

namespace App\Library\Services;

use App\Models\Setting;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\User;
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

}
