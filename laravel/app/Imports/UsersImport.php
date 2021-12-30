<?php

namespace App\Imports;

use App\Library\Services\MailHelperTools;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class UsersImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError
{
    use Importable, SkipsErrors;

    protected $send_auto_email;

    public function __construct($send_auto_email = null)
    {
        $this->send_auto_email = $send_auto_email;
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //var_dump($row);die();
        $MailHelperTools = new MailHelperTools();

        $user = new User([
            'login' => $row['login'],
            'hashpass' => $row['password'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'email' => $row['email'],
            'level' => $row['niveau_dacces'],
            'regime' => $row['regime'],
            'solde' => $row['solde'],
            'maj_solde' => $row['date_de_maj_solde'],
            'statut' => $row['statut'],
            'dtcreation' => $row['date_de_creation'],
            'dtexpiration' => $row['date_de_dexpiration'],
            'pt_conso' => $row['point_de_consommation'],
            'REM' => $row['remarque'],
            'libre' => $row['zone_libre'],
        ]);
        if ($this->send_auto_email == "on") {
            $MailHelperTools->sendCreationUserMail($user->prenom, $user->nom, $user->login, $user->hashpass, $user->email);
        }
        return $user;
    }

    public function rules(): array
    {
        return [
            'login' => ['required',
                'unique:act_user3',
                'max:15'],
            'nom' => ['required', 'max:30'],
            'prenom' => ['required', 'max:30'],
            'email' => ['required',
                'unique:act_user3',
                'max:30,email'],
            'libre' => ['max:100'],
            'REM' => ['max:50'],
        ];
    }


}
