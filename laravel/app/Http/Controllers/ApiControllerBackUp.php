<?php

namespace App\Http\Controllers;

use App\Models\BornAct;
use App\Models\User;
use App\Models\MariageAct;
use App\Models\DeathAct;
use App\Models\DiverAct;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function sdtDiversActs(Request $request)
    {
        $data = $meta = [];
       // var_dump("test l13");die();
        $DiversActs = DiverAct::orderByDesc('ID')->get();
      //  var_dump($MariageActs);die();
        foreach ($DiversActs as $b) {
            $row = array();
            //<th>Id</th>
            $row[] = '<label class="checkbox checkbox-single"><input type="checkbox" name="ids_diversActs[]" value="' . $b->ID . '" class="checkable"/><span></span></label>';

            // FAUX NOMS DE CHAMP DE DB A REFAIRE AVEC LES BONS

            //<th>Localité</th>
            $localite = $b->COMMUNE;
            $row[] = $localite;
            //<th>Période</th>
            $periode = $b->DATETXT;
            $row[] = $periode;
            //<th>Actes</th>
            $actes = $b->IDNIM;
            $row[] = $actes;
            //<th>Filiatifs</th>
            $filiatifs = $b->LIBRE;
            $row[] = $filiatifs;
         
            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formDiversAct(' . $b->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            //$btn_view='<a href="javascript:void(0)"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteDiversActs(' . $b->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $btn_view = '<a href="javascript:void(0)" onclick="_showDiversAct(' . $b->ID . ')"><i class="material-icons">remove_red_eye</i></a>';
            $row[] = $btn_view . $btn_edit . $btn_delete;
           // $row[]  = "";
           //  $row[]  = "";
           //  $row[]  = "";
            // $row[]  = "";
            // $row[]  = "";
            // $row[]  = ""; 
           // var_dump($row);die();
            $data[] = $row;
        } 
        $result = [
            'data' => $data,
        ];
       
        return response()->json($result);
    }
    public function sdtDeathActs(Request $request)
    {
        $data = $meta = [];
       // var_dump("test l13");die();
        $DeathActs = DeathAct::orderByDesc('ID')->get();
      //  var_dump($MariageActs);die();
        foreach ($DeathActs as $b) {
            $row = array();
            //<th>Id</th>
            $row[] = '<label class="checkbox checkbox-single"><input type="checkbox" name="ids_deathActs[]" value="' . $b->ID . '" class="checkable"/><span></span></label>';

            // FAUX NOMS DE CHAMP DE DB A REFAIRE AVEC LES BONS

            //<th>Localité</th>
            $localite = $b->COMMUNE;
            $row[] = $localite;
            //<th>Période</th>
            $periode = $b->DATETXT;
            $row[] = $periode;
            //<th>Actes</th>
            $actes = $b->IDNIM;
            $row[] = $actes;
            //<th>Filiatifs</th>
            $filiatifs = $b->LIBRE;
            $row[] = $filiatifs;
         
            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formDeathAct(' . $b->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            //$btn_view='<a href="javascript:void(0)"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteDeathActs(' . $b->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $btn_view = '<a href="javascript:void(0)" onclick="_showDeathAct(' . $b->ID . ')"><i class="material-icons">remove_red_eye</i></a>';
            $row[] = $btn_view . $btn_edit . $btn_delete;
          
           // $row[]  = "";
           //  $row[]  = "";
           //  $row[]  = "";
            // $row[]  = "";
            // $row[]  = "";
            // $row[]  = ""; 
           // var_dump($row);die();
            $data[] = $row;
        } 
        $result = [
            'data' => $data,
        ];
       
        return response()->json($result);
    }
    public function sdtMariageActs(Request $request)
    {
        $data = $meta = [];
       // var_dump("test l13");die();
        $MariageActs = MariageAct::orderByDesc('ID')->get();
      //  var_dump($MariageActs);die();
        foreach ($MariageActs as $b) {
            $row = array();
            //<th>Id</th>
            $row[] = '<label class="checkbox checkbox-single"><input type="checkbox" name="ids_mariageActs[]" value="' . $b->ID . '" class="checkable"/><span></span></label>';

            // FAUX NOMS DE CHAMP DE DB A REFAIRE AVEC LES BONS

            //<th>Localité</th>
            $localite = $b->COMMUNE;
            $row[] = $localite;
            //<th>Période</th>
            $periode = $b->DATETXT;
            $row[] = $periode;
            //<th>Actes</th>
            $actes = $b->IDNIM;
            $row[] = $actes;
            //<th>Filiatifs</th>
            $filiatifs = $b->LIBRE;
            $row[] = $filiatifs;
         
            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formMariageAct(' . $b->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            //$btn_view='<a href="javascript:void(0)"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteMariageActs(' . $b->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $btn_view = '<a href="javascript:void(0)" onclick="_showMariageAct(' . $b->ID . ')"><i class="material-icons">remove_red_eye</i></a>';
            $row[] = $btn_view . $btn_edit . $btn_delete;
           
           // $row[]  = "";
           //  $row[]  = "";
           //  $row[]  = "";
            // $row[]  = "";
            // $row[]  = "";
            // $row[]  = ""; 
           // var_dump($row);die();
            $data[] = $row;
        } 
        $result = [
            'data' => $data,
        ];
       
        return response()->json($result);
    }
    public function sdtBornActs(Request $request)
    {
        $data = $meta = [];
       // var_dump("test l13");die();
        $bornActs = BornAct::orderByDesc('ID')->get();
       // var_dump($bornActs);die();
        foreach ($bornActs as $b) {
            $row = array();
            //<th>Id</th>
            $row[] = '<label class="checkbox checkbox-single"><input type="checkbox" name="ids_bornActs[]" value="' . $b->ID . '" class="checkable"/><span></span></label>';

            // FAUX NOMS DE CHAMP DE DB A REFAIRE AVEC LES BONS

            //<th>Localité</th>
            $localite = $b->COMMUNE;
            $row[] = $localite;
            //<th>Période</th>
            $periode = $b->DATETXT;
            $row[] = $periode;
            //<th>Actes</th>
            $actes = $b->IDNIM;
            $row[] = $actes;
            //<th>Filiatifs</th>
            $filiatifs = $b->LIBRE;
            $row[] = $filiatifs;
         
            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formBornAct(' . $b->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            //$btn_view='<a href="javascript:void(0)"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteBornActs(' . $b->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $btn_view = '<a href="javascript:void(0)" onclick="_showBornAct(' . $b->ID . ')"><i class="material-icons">remove_red_eye</i></a>';
            $row[] = $btn_view . $btn_edit . $btn_delete;
           // $row[]  = "";
           //  $row[]  = "";
           //  $row[]  = "";
            // $row[]  = "";
            // $row[]  = "";
            // $row[]  = ""; 
            //var_dump($row);die();
            $data[] = $row;
        } 
        $result = [
            'data' => $data,
        ];
       
        return response()->json($result);
    }

    //
    public function sdtUsers(Request $request)
    {
        $data = $meta = [];
        $users = User::orderByDesc('ID')->get();
        foreach ($users as $u) {
            $row = array();
            //<th>Id</th>
            $row[] = '<label class="checkbox checkbox-single"><input type="checkbox" name="ids_users[]" value="' . $u->ID . '" class="checkable"/><span></span></label>';
            //$row[]=$d->id;

            //<th>Name</th>
            $full_name = '<p class="mb-0">' . $u->nom . ' ' . $u->prenom . '</p>';

            $login = ($u->login) ? ('<span class="chip blue lighten-5">@' . $u->login . '</span>') : '';
            $row[] = $full_name . $login;


            //<th>Statut</th>
            $class = '';
            $statut = $u->statut;
            if ($u->statut == 'W') {
                $class = 'blue';
                $statut .= " : Attente d'activation";
            } elseif ($u->statut == 'A') {
                $class = 'orange';
                $statut .= " : Attente d'approbation";
            } elseif ($u->statut == 'N') {
                $class = 'green';
                $statut .= " : Accès autorisé";
            } elseif ($u->statut == 'B') {
                $class = 'red';
                $statut .= " : Accès bloqué";
            }
            $row[] = '<span class=" chip ' . $class . ' lighten-6"><b>' . $statut . '</b></span>';

            //<th>Niveau d'accès</th>
            $class = '';
            $textcolor = 'black-text';
            $level = $u->level;

            if ($level == '0') {
                $level .= " : Aucun accès";
                $class = 'lime lighten-5';
            } elseif ($level == '1') {
                $level .= " : Liste des communes";
                $class = 'lime lighten-4';
            } elseif ($level == '2') {
                $level .= " : Liste des patronymes";
                $class = 'lime lighten-3';
            } elseif ($level == '3') {
                $level .= " : Table des actes";
                $class = 'lime lighten-2';
            } elseif ($level == '4') {
                $level .= " : Détails des actes (avec limites)";
                $class = 'lime lighten-1';
            } elseif ($level == '5') {
                $level .= " : Détails sans limitations";
                $class = 'lime';
            } elseif ($level == '6') {
                $level .= " : Chargement NIMEGUE et CSV";
                $class = 'lime darken-1';
                $textcolor = 'white-text';
            } elseif ($level == '7') {
                $level .= " : Ajout d'actes";
                $class = 'lime darken-2';
                $textcolor = 'white-text';
            } elseif ($level == '8') {
                $level .= " : Administration tous actes";
                $class = 'lime darken-3';
                $textcolor = 'white-text';
            } elseif ($level == '9') {
                $level .= " : Gestion des utilisateurs";
                $class = 'lime darken-4';
                $textcolor = 'white-text';
            }

            $row[] = '<span class=" chip ' . $class . ' lighten-5"><b class="' . $textcolor . '">' . $level . '</b></span>';

            //<th>Email</th>
            $row[] = '<span class="chip blue lighten-5"><span class="blue-text">' . $u->email . '</span></span>';


            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formUser(' . $u->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            $btn_view = '<a href="javascript:void(0)" onclick="_showUser(' . $u->ID . ')"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteUsers(' . $u->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $row[] = $btn_view . $btn_edit . $btn_delete;
            $data[] = $row;
        }
        $result = [
            'data' => $data,
        ];
        return response()->json($result);
    }


    public function deleteUsers(Request $request)
    {
        $success = false;
        if ($request->isMethod('delete')) {
            if ($request->has('ids')) {
                $ids = $request->ids;
                if (count($ids) > 0) {
                    $nbDeletedRows = User::whereIn('id', $ids)->delete();
                    if ($nbDeletedRows > 0) {
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    }

    public function deleteBornActs(Request $request)
    {
        $success = false;
        if ($request->isMethod('delete')) {
            if ($request->has('ids')) {
                $ids = $request->ids;
                if (count($ids) > 0) {
                    $nbDeletedRows=BornAct::whereIn('id', $ids)->delete();
                    if($nbDeletedRows>0){
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    } 
    public function deleteMariageActs(Request $request)
    {
        $success = false;
        if ($request->isMethod('delete')) {
            if ($request->has('ids')) {
                $ids = $request->ids;
                if (count($ids) > 0) {
                    $nbDeletedRows=MariageAct::whereIn('id', $ids)->delete();
                    if($nbDeletedRows>0){
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    } 
    public function deleteDeathActs(Request $request)
    {
        $success = false;
        if ($request->isMethod('delete')) {
            if ($request->has('ids')) {
                $ids = $request->ids;
                if (count($ids) > 0) {
                    $nbDeletedRows=DeathAct::whereIn('id', $ids)->delete();
                    if($nbDeletedRows>0){
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    } 
    public function   deleteDiversActs(Request $request)
    {
        $success = false;
        if ($request->isMethod('delete')) {
            if ($request->has('ids')) {
                $ids = $request->ids;
                if (count($ids) > 0) {
                    $nbDeletedRows=DiverAct::whereIn('id', $ids)->delete();
                    if($nbDeletedRows>0){
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    }
  
}
