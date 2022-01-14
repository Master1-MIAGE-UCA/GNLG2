<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Exports\BornActExport;
use App\Exports\MariageActExport;
use App\Exports\DeathActExport;
use App\Exports\DiversActExport;
use App\Imports\UsersImport;
use App\Imports\BornActsImport;
use App\Imports\MariageActsImport;
use App\Imports\DeathActsImport;
use App\Imports\DiversActsImport;
use App\Library\Services\DbHelperTools;
use App\Library\Services\MailHelperTools;
use App\Models\User;
use App\Models\BornAct;
use App\Models\MariageAct;
use App\Models\Parametre;
use App\Models\DiverAct;
use App\Models\DeathAct;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AppController extends Controller
{
    //
    public function storeFormParam(Request $request){
        //var_dump($request->all());die();
        //var_dump($request->all());die();
        $success = false;
        $msg = 'Les parametres ne sont pas bien enregistrer  ';
        if ($request->isMethod('post')) {
              //Nom du site
            if (isset($request->siteName)) {
                $siteName= $request->siteName;
                Parametre::where('param', 'SITENAME')->update(['valeur' => $siteName]);
            }
            //URL de site
            if (isset($request->urlSite)) {
                $urlSite= $request->urlSite;
                Parametre::where('param', 'SITE_URL')->update(['valeur' => $urlSite]);
            }
            // nombre max de page
            if (isset($request->maxPage)) {
                $maxPage= $request->maxPage;
                Parametre::where('param', 'MAX_PAGE')->update(['valeur' => $maxPage]);
            }
            //nombre max de page admin
            if (isset($request->maxPageAdm)) {
                $maxPageAdm= $request->maxPageAdm;
                Parametre::where('param', 'MAX_PAGE_ADM')->update(['valeur' => $maxPageAdm]);
            }
            //mode alphabétique
            if (isset($request->maxPatr)) {
                $maxPatr= $request->maxPatr;
                Parametre::where('param', 'MAX_PATR')->update(['valeur' => $maxPatr]);
            }
             //mode alphabétique Admin
             if (isset($request->maxPatrAdm)) {
                $maxPatrAdm= $request->maxPatrAdm;
                Parametre::where('param', 'MAX_PATR_ADM')->update(['valeur' => $maxPatrAdm]);
            }
              //Date
              if (isset($request->showDate)) {
                $showDate= $request->showDate;
                Parametre::where('param', 'SHOW_DATES')->update(['valeur' => $showDate]);
            }
              //Distrubition
              if (isset($request->distAnn)) {
                $distAnn= $request->distAnn;
                Parametre::where('param', 'SHOW_DISTRIBUTION')->update(['valeur' => $distAnn]);
            }
              //Type
              if (isset($request->showType)) {
                $showType= $request->showType;
                Parametre::where('param', 'SHOW_ALLTYPES')->update(['valeur' => $showType]);
            }
                //Image
                if (isset($request->image)) {
                    $image= $request->image;
                    Parametre::where('param', 'JPG_SI_LOGIN')->update(['valeur' => $image]);
                }
                    //Avertissement
              if (isset($request->aver)) {
                $aver= $request->aver;
                Parametre::where('param', 'AVERTISMT')->update(['valeur' => $aver]);
            }
                //pied page
                if (isset($request->piedPage)) {
                    $piedPage= $request->piedPage;
                    Parametre::where('param', 'PIED_PAGE')->update(['valeur' => $piedPage]);
                }
                //publication zone
                if (isset($request->pubZone)) {
                    $pubZone= $request->pubZone;
                    Parametre::where('param', 'PUB_ZONE_MENU')->update(['valeur' => $pubZone]);
                }
                //Cookie
                if (isset($request->cookie)) {
                    $cookie= $request->cookie;
                    Parametre::where('param', 'COOKIE_MESSAGE')->update(['valeur' => $cookie]);
                }
                //Cookie URL
                if (isset($request->cookieUrl)) {
                    $cookieUrl= $request->cookieUrl;
                    Parametre::where('param', 'COOKIE_URL_INFO')->update(['valeur' => $cookieUrl]);
                }
                 //Cookie Style
                 if (isset($request->cookieStyle)) {
                    $cookieStyle= $request->cookieStyle;
                    Parametre::where('param', 'COOKIE_STYLE')->update(['valeur' => $cookieStyle]);
                }
                 //full url
                 if (isset($request->fullUrl)) {
                    $fullUrl= $request->fullUrl;
                    Parametre::where('param', 'FULL_URL')->update(['valeur' => $fullUrl]);
                }
                 // url jpg
                 if (isset($request->urlJpg)) {
                    $urlJpg= $request->urlJpg;
                    Parametre::where('param', 'URL_JPG')->update(['valeur' => $urlJpg]);
                }
                if (isset($request->showNull)) {
                    $showNull= $request->showNull;
                    Parametre::where('param', 'SHOW_NULL')->update(['valeur' => $showNull]);
                }
                if (isset($request->showDeposant)) {
                    $showDeposant= $request->showDeposant;
                    Parametre::where('param', 'SHOW_DEPOSANT')->update(['valeur' => $showDeposant]);
                }
                if (isset($request->show_Annee)) {
                    $show_Annee= $request->show_Annee;
                    Parametre::where('param', 'ANNEE_TABLE')->update(['valeur' => $show_Annee]);
                }

                $success = true;
                $msg = 'Les parametres sont bien été enregistrer';

        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }

    function aideSuppPage()
    {
        return view('pages.indications.aideSupport');
    }

    function aideGestBdPage()
    {
        return view('pages.indications.aideGestionBD');
    }
    function aideActesPage()
    {
        return view('pages.indications.aideGestionActes');
    }
    function paramsPage()
    {
        $siteName=Parametre::where('param','LIKE','SITENAME')->first();
        $urlSite=Parametre::where('param','LIKE','SITE_URL')->first();
        $maxPage=Parametre::where('param','LIKE','MAX_PAGE')->first();
        $maxPageAdm=Parametre::where('param','LIKE','MAX_PAGE_ADM')->first();
        $maxPatr=Parametre::where('param','LIKE','MAX_PATR')->first();
        $maxPatrAdm=Parametre::where('param','LIKE','MAX_PATR_ADM')->first();
        $showDate=Parametre::where('param','LIKE','SHOW_DATES')->first();
        $distAnn=Parametre::where('param','LIKE','SHOW_DISTRIBUTION')->first();
        $showType=Parametre::where('param','LIKE','SHOW_ALLTYPES')->first();
        $image=Parametre::where('param','LIKE','JPG_SI_LOGIN')->first();
        $aver=Parametre::where('param','LIKE','AVERTISMT')->first();
        $piedPage=Parametre::where('param','LIKE','PIED_PAGE')->first();
        $pubZone=Parametre::where('param','LIKE','PUB_ZONE_MENU')->first();
        $cookie=Parametre::where('param','LIKE','COOKIE_MESSAGE')->first();
        $cookieUrl=Parametre::where('param','LIKE','COOKIE_URL_INFO')->first();
        $cookieStyle=Parametre::where('param','LIKE','COOKIE_STYLE')->first();
        $fullUrl=Parametre::where('param','LIKE','FULL_URL')->first();
        $urlJpg=Parametre::where('param','LIKE','URL_JPG')->first();
        $showNull=Parametre::where('param','LIKE','SHOW_NULL')->first();
        $showDeposant=Parametre::where('param','LIKE','SHOW_DEPOSANT')->first();
        $ann=Parametre::where('param','LIKE','ANNEE_TABLE')->first();


        return view('pages.logiciel.params',compact('siteName','urlSite','maxPage','maxPageAdm','maxPatr','maxPatrAdm','showDate','distAnn','showType','image','aver','piedPage','pubZone','cookie','cookieUrl','cookieStyle','fullUrl','urlJpg','showNull','showDeposant','ann'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardPage()
    {

        $total_users = User::all()->count();
        $total_act_nai = BornAct::all()->count();
        $total_act_mar = DeathAct::all()->count();
        $total_act_div = DiverAct::all()->count();
        $total_act_dec = MariageAct::all()->count();
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
    function bornActForm($id)
    {
        $bornAct = null;

        if ($id > 0) {
            $bornAct = BornAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.bornAct-form', compact('bornAct'));
    }
    function mariageActForm($id)
    {
        $mariageAct = null;

        if ($id > 0) {
            $mariageAct = MariageAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.mariageAct-form', compact('mariageAct'));
    }
    function deathActForm($id)
    {
        $deathAct = null;

        if ($id > 0) {
            $deathAct = DeathAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.deathAct-form', compact('deathAct'));
    }
    function diversActForm($id)
    {
        $diversAct = null;

        if ($id > 0) {
            $diversAct = DiverAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.diversAct-form', compact('diversAct'));
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
    function bornActShow($id)
    {
        $bornAct = null;

        if ($id > 0) {
            $bornAct = BornAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.bornAct-show', compact('bornAct'));
    }
    function deathActShow($id)
    {
        $deathAct = null;

        if ($id > 0) {
            $deathAct = DeathAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.deathAct-show', compact('deathAct'));
    }
    function diversActShow($id)
    {
        $diversAct = null;

        if ($id > 0) {
            $diversAct = DiverAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.diversAct-show', compact('diversAct'));
    }

    function importUsersPage()
    {
        return view('pages.users.users-import');
    }
    function importBornActsPage()
    {
        return view('pages.acts.bornActs-import');
    }
    function importMariageActsPage()
    {
        return view('pages.acts.mariageActs-import');
    }
    function importDeathActsPage()
    {
        return view('pages.acts.deathActs-import');
    }
    function importDiversActsPage()
    {
        return view('pages.acts.diversActs-import');
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
                'hashpass' => sha1($request->hashpass),
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

                    $MailHelperTools->sendCreationUserMail($data['prenom'], $data['nom'], $data['login'], $request->hashpass, $data['email']);
                    $msg .= 'et l\'email est bien été envoyé';
                }

            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }
    public function exportDiversActsToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "diversActs_" . $date . ".xlsx";
        return Excel::download(new DiversActExport(), $name);

    }

    public function exportDiversActsToCSV()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "diversActs_" . $date . ".csv";
        return Excel::download(new DiversActExport(), $name);
    }
    public function exportDeathActsToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "deathActs_" . $date . ".xlsx";
        return Excel::download(new DeathActExport(), $name);

    }

    public function exportDeathActsToCSV()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "deathActs_" . $date . ".csv";
        return Excel::download(new DeathActExport(), $name);
    }
    public function exportMariageActsToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "mariageActs_" . $date . ".xlsx";
        return Excel::download(new MariageActExport(), $name);

    }

    public function exportMariageActsToCSV()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "mariageActs_" . $date . ".csv";
        return Excel::download(new MariageActExport(), $name);
    }
    public function exportUsersToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "users_" . $date . ".xlsx";
        return Excel::download(new UserExport(), $name);

    }

    public function exportBornActsToCSV()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "bornActs_" . $date . ".csv";
        return Excel::download(new BornActExport(), $name);
    }
    public function exportBornActsToExcel()
    {
        $date = Carbon::now()->format("jmY_his");
        $name = "bornActs_" . $date . ".xlsx";
        return Excel::download(new BornActExport(), $name);

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
    public function importBornActs()
    {
        // var_dump($request->file());die();

        $msg = "Les actes de naissance ont bien été importer";
        Excel::import(new BornActsImport(), request()->file('import-bornActs-files'));
        return ($msg);
    }
    public function importDiversActs()
    {
        // var_dump($request->file());die();

        $msg = "Les actes divers ont bien été importer";
        Excel::import(new DiversActsImport(), request()->file('import-diversActs-files'));
        return ($msg);
    }
    public function importMariageActs()
    {
        // var_dump($request->file());die();

        $msg = "Les actes de mariage ont bien été importer";
        Excel::import(new MariageActsImport(), request()->file('import-mariageActs-files'));
        return ($msg);
    }
    public function importDeathActs()
    {
        // var_dump($request->file());die();

        $msg = "Les actes de décés ont bien été importer";
        Excel::import(new DeathActsImport(), request()->file('import-deathActs-files'));
        return ($msg);
    }
    function storeFormBornAct(Request $request)
    {
        //var_dump($request->all());die();
        $success = false;
        $msg = 'L acte de naissance n\'est pas bien enregistrer  ';
        if ($request->isMethod('post')) {
            $DbHelperTools = new DbHelperTools();


            //var_dump($request->all());die();


            $required = (($request->ID == 0) ? 'required' : '');
            $unique = ($request->ID == '0') ? '|unique:act_nai3' : '';
            $validated = $request->validate([
                'addOrUpdate' => 'required' . $unique . '|max:15',
                'libre' => 'max:100',
                'REM' => 'max:50',
                "CODCOM" => 'max:100',
                "COMMUNE" => 'max:100',
                "CODDEP" =>'max:100',
                "DEPART" => 'max:100',
                "NOM "=> 'max:100',
                "PRE "=> 'max:100',
                "LADATE" =>  'max:100',
                "SEXE" =>  'max:100',
                "COM" =>  'max:100',
                "P_NOM" => 'max:100',
                "P_PRE" =>  'max:100',
                "P_PRO" =>  'max:100',
                "P_COM" =>  'max:100',
                "M_NOM" => 'max:100',
                "M_PRE" => 'max:100',
                "M_PRO" => 'max:100',
                "M_COM" => 'max:100',
                "T1_NOM" =>  'max:100',
                "T1_PRE "=> 'max:100',
                "T1_COM "=> 'max:100',
                "T2_NOM "=> 'max:100',
                "T2_PRE "=>  'max:100',
                "T2_COM "=> 'max:100',
                "COTE "=>  'max:100',
                "LIBRE "=>  'max:100',
                "COMGEN "=> 'max:100',
                "PHOTOS "=> 'max:100',
                "DEPOSANT" =>  'max:100',
                "PHOTOGRA" => 'max:100',
                "RELEVEUR" => 'max:100',
                "VERIFIEU" =>  'max:100',
                "DTDEPOT "=> 'max:100',
                "DTMODIF "=>  'max:100',
            ]);

            //   dd($validated);

            $data = array(
                'ID' => $request->ID,
                'addOrUpdate' => $request->addOrUpdate,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'libre' => $request->libre,
                'REM' => $request->REM,
                "CODCOM" => $request->CODCOM,
                "COMMUNE" => $request->COMMUNE,
                "CODDEP" =>$request->CODDEP,
                "DEPART" => $request->DEPART,
                "NOM"=>$request->NOM,
                "PRE"=>$request->PRE,
                "LADATE" =>  $request->LADATE,
                "SEXE" => $request->SEXE,
                "COM" =>  $request->COM,
                "P_NOM" =>$request->P_NOM,
                "P_PRE" =>  $request->P_PRE,
                "P_PRO" =>  $request->P_PRO,
                "P_COM" => $request->P_COM,
                "M_NOM" => $request->M_NOM,
                "M_PRE" => $request->M_PRE,
                "M_PRO" => $request->M_PRO,
                "M_COM" => $request->M_COM,
                "T1_NOM" =>  $request->T1_NOM,
                "T1_PRE"=> $request->T1_PRE,
                "T1_COM"=>$request->T1_COM,
                "T2_NOM"=> $request->T2_NOM,
                "T2_PRE"=> $request->T2_PRE,
                "T2_COM"=>$request->T2_COM ,
                "COTE"=>$request->COTE,
                "LIBRE"=>$request->LIBRE,
                "COMGEN"=>$request->COMGEN,
                "PHOTOS"=>$request->PHOTOS,
                "DEPOSANT" =>$request->DEPOSANT,
                "PHOTOGRA" =>$request->PHOTOGRA,
                "RELEVEUR" =>$request->RELEVEUR,
                "VERIFIEU" =>$request->VERIFIEU,
                "DTDEPOT"=> $request->DTDEPOT,
                "DTMODIF"=> $request->DTMODIF,
            );

            //var_dump($data);die();

            $bornAct_id = $DbHelperTools->manageBornAct($data);
            if ($bornAct_id > 0) {
                $success = true;
                $msg = 'L\'acte de naissance est bien été enregistrer';



            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }
    function mariageActShow($id)
    {
        $mariageAct = null;

        if ($id > 0) {
            $mariageAct = MariageAct::find($id);
        }
        // var_dump($user);die();
        return view('pages.acts.mariageAct-show', compact('mariageAct'));
    }
    function storeFormMariageAct(Request $request)
    {
        //var_dump($request->all());die();
        $success = false;
        $msg = 'Acte mariage n\'est pas bien enregistrer  ';
        if ($request->isMethod('post')) {
            $DbHelperTools = new DbHelperTools();


            //var_dump($request->all());die();


            $required = (($request->ID == 0) ? 'required' : '');
            $unique = ($request->ID == '0') ? '|unique:act_mar3' : '';
            $validated = $request->validate([

                "CODCOM" =>'max:100',
                "COMMUNE" =>'max:100',
                "CODDEP"=>'max:100',
                "DEPART" =>'max:100',
                "NOM"=> 'max:100',
                "PRE" =>'max:100',
                "DATETXT" => 'max:100',
                "LADATE" => 'max:100',
                "DNAIS" =>'max:100',
                "PRO" =>'max:100',
                "AGE" => 'max:100',
                "ORI" => 'max:100',
                "COM" => 'max:100',
                "P_NOM" =>'max:100',
                "P_PRE" => 'max:100',
                "P_PRO"=> 'max:100',
                "P_COM" =>'max:100',
                "CP_NOM" =>'max:100',
                "CP_PRE" =>'max:100',
                "CP_PRO" =>'max:100',
                "CP_COM" => 'max:100',
                "M_NOM" => 'max:100',
                "M_PRE" => 'max:100',
                "M_PRO" =>'max:100',
                "M_COM" => 'max:100',
                "CM_NOM" => 'max:100',
                "CM_PRE" =>'max:100',
                "CM_PRO" => 'max:100',
                "CM_COM" =>'max:100',
                "C_NOM" => 'max:100',
                "C_PRE" =>'max:100',
                "C_PRO" =>'max:100',
                "C_COM" =>'max:100',
                "C_ORI" => 'max:100',
                "C_DNAIS"=>'max:100',
                "C_AGE" =>'max:100',
                "C_EXCON"=>'max:100',
                "EXCON" =>'max:100',
                "C_X_COM" => 'max:100',
                "T1_NOM" => 'max:100',
                "T1_PRE" =>'max:100',
                "T1_COM" => 'max:100',
                "T2_NOM" =>'max:100',
                "T2_PRE" => 'max:100',
                "T2_COM" => 'max:100',
                "T3_NOM" => 'max:100',
                "T3_PRE" =>'max:100',
                "T3_COM" => 'max:100',
                "T4_NOM" =>'max:100',
                "T4_PRE" =>'max:100',
                "T4_COM" =>'max:100',
                "COTE" => 'max:100',
                "LIBRE" =>'max:100',
                "COMGEN" =>'max:100',
                "PHOTOS" =>'max:100',
                "DEPOSANT"  =>'max:100',
                "PHOTOGRA" =>'max:100',
                "RELEVEUR" =>'max:100',
                "VERIFIEU" =>'max:100',
                "DTDEPOT" =>'max:100',
                "DTMODIF" => 'max:100',
            ]);

            //   dd($validated);

            $data = array(
                'ID' => $request->ID,
                "CODCOM" =>$request->CODCOM,
                "COMMUNE" =>$request->COMMUNE,
                "CODDEP"=>$request->CODDEP,
                "DEPART" =>$request->DEPART,
                "NOM"=>$request->NOM,
                "PRE" =>$request->PRE,
                "DATETXT" =>$request->DATETXT,
                "LADATE" =>$request->LADATE,
                "DNAIS" =>$request->DNAIS,
                "PRO" =>$request->PRO,
                "AGE" => $request->AGE,
                "ORI" =>$request->ORI,
                "COM" =>$request->COM,
                "P_NOM" =>$request->P_NOM,
                "P_PRE" =>$request->P_PRE,
                "P_PRO"=>$request->P_PRO,
                "P_COM" =>$request->P_COM,
                "CP_NOM" =>$request->CP_NOM,
                "CP_PRE" =>$request->CP_PRE,
                "CP_PRO" =>$request->CP_PRO,
                "CP_COM" => $request->CP_COM,
                "M_NOM" => $request->M_NOM,
                "M_PRE" => $request->M_PRE,
                "M_PRO" =>$request->M_PRO,
                "M_COM" => $request->M_COM,
                "CM_NOM" =>$request->CM_NOM,
                "CM_PRE" =>$request->CM_PRE,
                "CM_PRO" => $request->CM_PRO,
                "CM_COM" =>$request->CM_COM,
                "C_NOM" =>$request->C_NOM,
                "C_PRE" =>$request->C_PRE,
                "C_PRO" =>$request->C_PRO,
                "C_COM" =>$request->C_COM,
                "C_ORI" => $request->C_ORI,
                "C_DNAIS"=>$request->C_DNAIS,
                "C_AGE" =>$request->C_AGE,
                "C_EXCON"=>$request->C_EXCON,
                "EXCON" =>$request->EXCON,
                "C_X_COM" =>$request->C_X_COM,
                "T1_NOM" =>$request->T1_NOM,
                "T1_PRE" =>$request->T1_PRE,
                "T1_COM" =>$request->T1_COM,
                "T2_NOM" =>$request->T2_NOM,
                "T2_PRE" => $request->T2_PRE,
                "T2_COM" => $request->T2_COM,
                "T3_NOM" => $request->T3_NOM,
                "T3_PRE" =>$request->T3_PRE,
                "T3_COM" => $request->T3_COM,
                "T4_NOM" =>$request->T4_NOM,
                "T4_PRE" =>$request->T4_PRE,
                "T4_COM" =>$request->T4_COM,
                "COTE" =>$request->COTE,
                "LIBRE" =>$request->LIBRE,
                "COMGEN" =>$request->COMGEN,
                "PHOTOS" =>$request->PHOTOS,
                "DEPOSANT"  =>$request->DEPOSANT,
                "PHOTOGRA" =>$request->PHOTOGRA,
                "RELEVEUR" =>$request->RELEVEUR,
                "VERIFIEU" =>$request->VERIFIEU,
                "DTDEPOT" =>$request->DTDEPOT,
                "DTMODIF" => $request->DTMODIF,
            );

            //var_dump($data);die();

            $mariageAct_id = $DbHelperTools->manageMariageAct($data);
            if ($mariageAct_id > 0) {
                $success = true;
                $msg = 'L\'acte de mariage est bien été enregistrer';



            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }
    function storeFormDiversAct(Request $request)
    {
        //var_dump($request->all());die();
        $success = false;
        $msg = 'Acte  n\'est pas bien enregistrer  ';
        if ($request->isMethod('post')) {
            $DbHelperTools = new DbHelperTools();


            //var_dump($request->all());die();


            $required = (($request->ID == 0) ? 'required' : '');
            $unique = ($request->ID == '0') ? '|unique:act_div3' : '';
            $validated = $request->validate([

                "CODCOM" =>'max:100',
                "COMMUNE" =>'max:100',
                "CODDEP"=>'max:100',
                "DEPART" =>'max:100',
                "NOM"=> 'max:100',
                "PRE" =>'max:100',
                "DATETXT" => 'max:100',
                "LADATE" => 'max:100',
                "DNAIS" =>'max:100',
                "PRO" =>'max:100',
                "AGE" => 'max:100',
                "ORI" => 'max:100',
                "COM" => 'max:100',
                "P_NOM" =>'max:100',
                "P_PRE" => 'max:100',
                "P_PRO"=> 'max:100',
                "P_COM" =>'max:100',
                "CP_NOM" =>'max:100',
                "CP_PRE" =>'max:100',
                "CP_PRO" =>'max:100',
                "CP_COM" => 'max:100',
                "M_NOM" => 'max:100',
                "M_PRE" => 'max:100',
                "M_PRO" =>'max:100',
                "M_COM" => 'max:100',
                "CM_NOM" => 'max:100',
                "CM_PRE" =>'max:100',
                "CM_PRO" => 'max:100',
                "CM_COM" =>'max:100',
                "C_NOM" => 'max:100',
                "C_PRE" =>'max:100',
                "C_PRO" =>'max:100',
                "C_COM" =>'max:100',
                "C_ORI" => 'max:100',
                "C_DNAIS"=>'max:100',
                "C_AGE" =>'max:100',
                "C_EXCON"=>'max:100',
                "EXCON" =>'max:100',
                "C_X_COM" => 'max:100',
                "T1_NOM" => 'max:100',
                "T1_PRE" =>'max:100',
                "T1_COM" => 'max:100',
                "T2_NOM" =>'max:100',
                "T2_PRE" => 'max:100',
                "T2_COM" => 'max:100',
                "T3_NOM" => 'max:100',
                "T3_PRE" =>'max:100',
                "T3_COM" => 'max:100',
                "T4_NOM" =>'max:100',
                "T4_PRE" =>'max:100',
                "T4_COM" =>'max:100',
                "COTE" => 'max:100',
                "LIBRE" =>'max:100',
                "COMGEN" =>'max:100',
                "PHOTOS" =>'max:100',
                "DEPOSANT"  =>'max:100',
                "PHOTOGRA" =>'max:100',
                "RELEVEUR" =>'max:100',
                "VERIFIEU" =>'max:100',
                "DTDEPOT" =>'max:100',
                "DTMODIF" => 'max:100',
            ]);

            //   dd($validated);

            $data = array(
                'ID' => $request->ID,
                "CODCOM" =>$request->CODCOM,
                "COMMUNE" =>$request->COMMUNE,
                "CODDEP"=>$request->CODDEP,
                "DEPART" =>$request->DEPART,
                "NOM"=>$request->NOM,
                "PRE" =>$request->PRE,
                "DATETXT" =>$request->DATETXT,
                "LADATE" =>$request->LADATE,
                "DNAIS" =>$request->DNAIS,
                "PRO" =>$request->PRO,
                "AGE" => $request->AGE,
                "ORI" =>$request->ORI,
                "COM" =>$request->COM,
                "P_NOM" =>$request->P_NOM,
                "P_PRE" =>$request->P_PRE,
                "P_PRO"=>$request->P_PRO,
                "P_COM" =>$request->P_COM,
                "CP_NOM" =>$request->CP_NOM,
                "CP_PRE" =>$request->CP_PRE,
                "CP_PRO" =>$request->CP_PRO,
                "CP_COM" => $request->CP_COM,
                "M_NOM" => $request->M_NOM,
                "M_PRE" => $request->M_PRE,
                "M_PRO" =>$request->M_PRO,
                "M_COM" => $request->M_COM,
                "CM_NOM" =>$request->CM_NOM,
                "CM_PRE" =>$request->CM_PRE,
                "CM_PRO" => $request->CM_PRO,
                "CM_COM" =>$request->CM_COM,
                "C_NOM" =>$request->C_NOM,
                "C_PRE" =>$request->C_PRE,
                "C_PRO" =>$request->C_PRO,
                "C_COM" =>$request->C_COM,
                "C_ORI" => $request->C_ORI,
                "C_DNAIS"=>$request->C_DNAIS,
                "C_AGE" =>$request->C_AGE,
                "C_EXCON"=>$request->C_EXCON,
                "EXCON" =>$request->EXCON,
                "C_X_COM" =>$request->C_X_COM,
                "T1_NOM" =>$request->T1_NOM,
                "T1_PRE" =>$request->T1_PRE,
                "T1_COM" =>$request->T1_COM,
                "T2_NOM" =>$request->T2_NOM,
                "T2_PRE" => $request->T2_PRE,
                "T2_COM" => $request->T2_COM,
                "T3_NOM" => $request->T3_NOM,
                "T3_PRE" =>$request->T3_PRE,
                "T3_COM" => $request->T3_COM,
                "T4_NOM" =>$request->T4_NOM,
                "T4_PRE" =>$request->T4_PRE,
                "T4_COM" =>$request->T4_COM,
                "COTE" =>$request->COTE,
                "LIBRE" =>$request->LIBRE,
                "COMGEN" =>$request->COMGEN,
                "PHOTOS" =>$request->PHOTOS,
                "DEPOSANT"  =>$request->DEPOSANT,
                "PHOTOGRA" =>$request->PHOTOGRA,
                "RELEVEUR" =>$request->RELEVEUR,
                "VERIFIEU" =>$request->VERIFIEU,
                "DTDEPOT" =>$request->DTDEPOT,
                "DTMODIF" => $request->DTMODIF,
            );

            //var_dump($data);die();

            $diversAct_id = $DbHelperTools->manageDiversAct($data);
            if ($diversAct_id > 0) {
                $success = true;
                $msg = 'L\'acte est bien été enregistrer';



            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }
    function storeFormDeathAct(Request $request)
    {
        //var_dump($request->all());die();
        $success = false;
        $msg = 'Acte de décés n\'est pas bien enregistrer  ';
        if ($request->isMethod('post')) {
            $DbHelperTools = new DbHelperTools();


            //var_dump($request->all());die();


            $required = (($request->ID == 0) ? 'required' : '');
            $unique = ($request->ID == '0') ? '|unique:act_dec3' : '';
            $validated = $request->validate([

                "CODCOM" =>'max:100',
                "COMMUNE" =>'max:100',
                "CODDEP"=>'max:100',
                "DEPART" =>'max:100',
                "NOM"=> 'max:100',
                "PRE" =>'max:100',
                "DATETXT" => 'max:100',
                "LADATE" => 'max:100',
                "DNAIS" =>'max:100',
                "PRO" =>'max:100',
                "AGE" => 'max:100',
                "ORI" => 'max:100',
                "COM" => 'max:100',
                "P_NOM" =>'max:100',
                "P_PRE" => 'max:100',
                "P_PRO"=> 'max:100',
                "P_COM" =>'max:100',
                "CP_NOM" =>'max:100',
                "CP_PRE" =>'max:100',
                "CP_PRO" =>'max:100',
                "CP_COM" => 'max:100',
                "M_NOM" => 'max:100',
                "M_PRE" => 'max:100',
                "M_PRO" =>'max:100',
                "M_COM" => 'max:100',
                "CM_NOM" => 'max:100',
                "CM_PRE" =>'max:100',
                "CM_PRO" => 'max:100',
                "CM_COM" =>'max:100',
                "C_NOM" => 'max:100',
                "C_PRE" =>'max:100',
                "C_PRO" =>'max:100',
                "C_COM" =>'max:100',
                "C_ORI" => 'max:100',
                "C_DNAIS"=>'max:100',
                "C_AGE" =>'max:100',
                "C_EXCON"=>'max:100',
                "EXCON" =>'max:100',
                "C_X_COM" => 'max:100',
                "T1_NOM" => 'max:100',
                "T1_PRE" =>'max:100',
                "T1_COM" => 'max:100',
                "T2_NOM" =>'max:100',
                "T2_PRE" => 'max:100',
                "T2_COM" => 'max:100',
                "T3_NOM" => 'max:100',
                "T3_PRE" =>'max:100',
                "T3_COM" => 'max:100',
                "T4_NOM" =>'max:100',
                "T4_PRE" =>'max:100',
                "T4_COM" =>'max:100',
                "COTE" => 'max:100',
                "LIBRE" =>'max:100',
                "COMGEN" =>'max:100',
                "PHOTOS" =>'max:100',
                "DEPOSANT"  =>'max:100',
                "PHOTOGRA" =>'max:100',
                "RELEVEUR" =>'max:100',
                "VERIFIEU" =>'max:100',
                "DTDEPOT" =>'max:100',
                "DTMODIF" => 'max:100',
                'addOrUpdate' => 'required' . $unique . '|max:15',
            ]);

            //   dd($validated);

            $data = array(
                'addOrUpdate' => $request->addOrUpdate,
                'ID' => $request->ID,
                "CODCOM" =>$request->CODCOM,
                "COMMUNE" =>$request->COMMUNE,
                "CODDEP"=>$request->CODDEP,
                "DEPART" =>$request->DEPART,
                "NOM"=>$request->NOM,
                "PRE" =>$request->PRE,
                "DATETXT" =>$request->DATETXT,
                "LADATE" =>$request->LADATE,
                "DNAIS" =>$request->DNAIS,
                "PRO" =>$request->PRO,
                "AGE" => $request->AGE,
                "ORI" =>$request->ORI,
                "COM" =>$request->COM,
                "P_NOM" =>$request->P_NOM,
                "P_PRE" =>$request->P_PRE,
                "P_PRO"=>$request->P_PRO,
                "P_COM" =>$request->P_COM,
                "CP_NOM" =>$request->CP_NOM,
                "CP_PRE" =>$request->CP_PRE,
                "CP_PRO" =>$request->CP_PRO,
                "CP_COM" => $request->CP_COM,
                "M_NOM" => $request->M_NOM,
                "M_PRE" => $request->M_PRE,
                "M_PRO" =>$request->M_PRO,
                "M_COM" => $request->M_COM,
                "CM_NOM" =>$request->CM_NOM,
                "CM_PRE" =>$request->CM_PRE,
                "CM_PRO" => $request->CM_PRO,
                "CM_COM" =>$request->CM_COM,
                "C_NOM" =>$request->C_NOM,
                "C_PRE" =>$request->C_PRE,
                "C_PRO" =>$request->C_PRO,
                "C_COM" =>$request->C_COM,
                "C_ORI" => $request->C_ORI,
                "C_DNAIS"=>$request->C_DNAIS,
                "C_AGE" =>$request->C_AGE,
                "C_EXCON"=>$request->C_EXCON,
                "EXCON" =>$request->EXCON,
                "C_X_COM" =>$request->C_X_COM,
                "T1_NOM" =>$request->T1_NOM,
                "T1_PRE" =>$request->T1_PRE,
                "T1_COM" =>$request->T1_COM,
                "T2_NOM" =>$request->T2_NOM,
                "T2_PRE" => $request->T2_PRE,
                "T2_COM" => $request->T2_COM,
                "T3_NOM" => $request->T3_NOM,
                "T3_PRE" =>$request->T3_PRE,
                "T3_COM" => $request->T3_COM,
                "T4_NOM" =>$request->T4_NOM,
                "T4_PRE" =>$request->T4_PRE,
                "T4_COM" =>$request->T4_COM,
                "COTE" =>$request->COTE,
                "LIBRE" =>$request->LIBRE,
                "COMGEN" =>$request->COMGEN,
                "PHOTOS" =>$request->PHOTOS,
                "DEPOSANT"  =>$request->DEPOSANT,
                "PHOTOGRA" =>$request->PHOTOGRA,
                "RELEVEUR" =>$request->RELEVEUR,
                "VERIFIEU" =>$request->VERIFIEU,
                "DTDEPOT" =>$request->DTDEPOT,
                "DTMODIF" => $request->DTMODIF,
            );

            //var_dump($data);die();

            $deathAct_id = $DbHelperTools->manageDeathAct($data);
            if ($deathAct_id > 0) {
                $success = true;
                $msg = 'L\'acte de décés est bien été enregistrer';



            }
        }
        return response()->json([
            'success' => $success,
            'msg' => $msg,
        ]);
    }
    public function downloadExampleUsers()
    {
        return Storage::get('exemple-users.csv');
         //return Storage::download('csv/exemple-users.csv');
         //Storage::disk('public')->download('exemple-users');

    }


}
