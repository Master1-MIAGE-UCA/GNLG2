<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
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
            $row[] = $full_name  . $login;


            //<th>Statut</th>
            $row[] = '<span>' . $u->statut . '</span>';

            //<th>Email</th>
            $row[] = '<span class="chip green lighten-5"><span class="green-text">' . $u->email . '</span></span>';



            //<th>Actions</th>
            $btn_edit = '<a href="javascript:void(0)" onclick="_formUser(' . $u->ID . ')" class="green-text"><i class="material-icons">edit</i></a>';
            //$btn_view='<a href="javascript:void(0)"><i class="material-icons">remove_red_eye</i></a>';
            $btn_delete = '<a href="javascript:void(0)" onclick="_deleteUsers(' . $u->ID . ')" class="grey-text"><i class="material-icons">delete</i></a>';
            $row[] = $btn_edit . $btn_delete;
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
                    $nbDeletedRows=User::whereIn('id', $ids)->delete();
                    if($nbDeletedRows>0){
                        $success = true;
                    }
                }
            }
        }
        return response()->json(['success' => $success]);
    }
}
