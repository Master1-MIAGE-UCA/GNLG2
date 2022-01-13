<?php

namespace App\Exports;

use App\Models\BornAct;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BornActExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BornAct::all();
    }
    public function headings(): array
    {
        return [
            "Code INSEE",
            "Code commune",
            "Commune",
            "Code departement",
            "Departement",
            "Type Acte",
            "Date Creation",
            "Date publication",
            "Cote",
            "Libre",
            "Nom",
            "Prenom",
            "Sexe",
            "Commentaire",
            "Nom du père",
            "Prenom du père",
            "Commentaire du père",
            "Profession du père",
            "Nom du mère",
            "Prenom du mère",
            "Commentaire du mère",
            "Profession du mère",
            "Nom du témoin1",
            "Prenom du temoin1",
            "Commentaire du témoin1",
            "Nom du témoin2",
            "Prenom du temoin2",
            "Commentaire du témoin2",
          

             "Commentaire generale",
            "Identifiant Nim",
            "Photos",
            "Date de naissance",
            "ID",
            "Deposant",
            "Photographe",
            "Releveur",
            "Verificateur",
            "Date de depot",
            "Date de modification",
        ];
    }
}
