<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UsersImport;
use App\Library\Services\DbHelperTools;
use App\Library\Services\MailHelperTools;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AppController extends Controller
{
    //

    public function dashboardPage()
    {

        $total_users = User::all()->count();
        $total_act_nai = 'NaN';
        $total_act_mar = 'NaN';
        $total_act_div = 'NaN';
        $total_act_dec = 'NaN';
        return view('pages.dashboard', compact('total_users', 'total_act_dec', 'total_act_div', 'total_act_mar', 'total_act_nai'));
    }

    function usersPage()
    {
        return view('pages.users.users');
    }

    function bornActsPage()
    {
        return view('pages.acts.bornActs');
    }

    function mariageActsPage()
    {
        return view('pages.acts.mariageActs');
    }

    function deathActsPage()
    {
        return view('pages.acts.deathActs');
    }

    function DiversActsPage()
    {
        return view('pages.acts.diversActs');
    }

    function userForm($id)
    {
        $user = null;
        $statuts = ['W', 'A', 'N', 'B'];
        $levels = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        if ($id > 0) {
            $user = User::find($id);
        }
        // var_dump($user);die();
        return view('pages.users.user-form', compact('user', 'levels', 'statuts'));

    }

    function userShow($id)
    {
        $user = null;

        if ($id > 0) {
            $user = User::find($id);
        }
        // var_dump($user);die();
        return view('pages.users.user-show', compact('user'));
    }

    function importUsersPage()
    {
        return view('pages.users.users-import');
    }


    public
    function storeFormUser(Request $request)
    {
        //var_dump($request->all());die();
        $success = false;
        $msg = 'Utilisateur n\'est pas bien enregistrer  ';
        if ($request->isMethod('post')) {
            $DbHelperTools = new DbHelperTools();
            $MailHelperTools = new MailHelperTools();

            //var_dump($request->all());die();


            $required = (($request->ID == 0) ? 'required' : '');
            $unique = ($request->ID == '0') ? '|unique:act_user3' : '';
            $validated = $request->validate([
                'login' => 'required' . $unique . '|max:15',
                'hashpass' => $required,
                'nom' => 'required|max:30',
                'prenom' => 'required|max:30',
                'email' => 'required' . $unique . '|max:30',
                'libre' => 'max:100',
                'REM' => 'max:50',
            ]);

            //   dd($validated);

            $data = array(
                'ID' => $request->ID,
                'login' => $request->login,
                'hashpass' => $request->hashpass,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'level' => $request->level,
                'statut' => $request->statut,
                'dtcreation' => $request->dtcreation,
                'dtexpiration' => $request->dtexpiration,
                'REM' => $request->REM,
                'libre' => $request->libre,
                //Pas encore connu avec quoi il faut les remplir :
                'regime' => $request->regime,
                'solde' => $request->solde,
                'maj_solde' => $request->maj_solde,
                'pt_conso' => $request->pt_conso,
                'auto_mail_send' => $request->auto_mail_send,
            );

            //var_dump($data);die();

            $user_id = $DbHelperTools->manageUser($data);
            if ($user_id > 0) {
                $success = true;
                $msg = 'L\'utilisateur est bien été enregistrer';

                //Si c'est la création de l'utilisateur et il est bien enregistrer alors envoie lui un email
                if ($data['ID'] == 0 && $data['auto_mail_send'] == 'on') {

                    $MailHelperTools->sendCreationUserMail($data['prenom'], $data['nom'], $data['login'], $data['hashpass'], $data['email']);
                    $msg .= 'et l\'email est bien été envoyé';
                }

            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }

    public function exportUsersToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "users_" . $date . ".xlsx";
        return Excel::download(new UserExport(), $name);

    }

    public function exportUsersToCSV()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "users_" . $date . ".csv";
        return Excel::download(new UserExport(), $name);
    }

    public function importUsers()
    {
        // var_dump($request->file());die();

        $msg = "Les utilisateurs ont bien été importer";
        Excel::import(new UsersImport(request()->auto_mail_send), request()->file('import-users-files'));
        return (request()->auto_mail_send == "on" ? $msg . ' et les emails d\'informations ont été bien envoyé' : $msg);
    }

    public function downloadExampleUsers()
    {
        return Storage::get('exemple-users.csv');
         //return Storage::download('csv/exemple-users.csv');
         //Storage::disk('public')->download('exemple-users');

    }


}
