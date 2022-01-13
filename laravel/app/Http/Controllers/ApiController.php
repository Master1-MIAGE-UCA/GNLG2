<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
}
