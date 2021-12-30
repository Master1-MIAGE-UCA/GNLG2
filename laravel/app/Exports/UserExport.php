<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            "Login",
            "Nom",
            "Prenom",
            "Email",
            "Niveau d'accès",
            "Regime",
            "Solde",
            "Date de màj solde",
            "Statut",
            "Date de création",
            "Date de d'éxpiration",
            "Point de consommation",
            "Remarque",
            "Zone libre",
            "ID",
        ];
    }
}
