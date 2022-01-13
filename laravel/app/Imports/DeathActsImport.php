<?php

namespace App\Imports;


use App\Models\DeathAct;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class DeathActsImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError
{
    use Importable, SkipsErrors;

    


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
      // var_dump($row);die();
      

        $deathAct = new DeathAct([
            //BD                //CSV 69
           
            'BIDON' => $row["code_insee"],         
   
            'CODCOM' => $row["code_commune"],
            'COMMUNE' => $row["commune"],
            'CODDEP' => $row["code_departement"],
            'DEPART' => $row["departement"],
            'TYPACT' => $row["type_acte"],
            'DATETXT' => $row["date_creation"],
            'DREPUB' => $row["date_publication"],
            'COTE' => $row["cote"],
            'LIBRE' => $row["libre"],
            'NOM' => $row["nom_de_l_epoux"],
            'PRE' => $row["prenom_de_l_epoux"],
            'ORI'=> $row["origine_de_l_epoux"],
            'DNAIS'=> $row["date_de_naissance_de_l_epoux"],
           'AGE'=> $row["age_de_l_epoux"],
           'PRO'=> $row["profession_de_l_epoux"],
           
           'COM' => $row["commentaire_de_l_epoux"],
            'P_NOM' => $row["nom_du_pere"],
            'P_PRE' => $row["prenom_du_pere"],
            'P_COM' => $row["commentaire_du_pere"],
            'P_PRO' => $row["profession_du_pere"],
            'M_NOM' => $row["nom_du_mere"],
            'M_PRE' => $row["prenom_du_mere"],
            'M_COM' => $row["commentaire_du_mere"],
            'M_PRO' => $row["profession_du_mere"],
            'C_NOM' => $row["nom_du_mere"],
            'C_PRE' => $row["prenom_du_mere"],
            'C_COM' => $row["commentaire_du_mere"],
            'C_PRO' => $row["profession_du_mere"],
            
            'T1_NOM' => $row["nom_du_temoin1"],
    

            'T1_PRE' => $row[ "prenom_du_temoin1"],
            'T1_COM' => $row["commentaire_du_temoin1"],
            'T2_NOM' => $row["nom_du_temoin2"],
            'T2_PRE' => $row["prenom_du_temoin2"],
            'T2_COM' => $row[ "commentaire_du_temoin2"],
            
          

            'COMGEN' => $row["commentaire_generale"],
            'IDNIM' => $row["identifiant_nim"],
            'PHOTOS' => $row["photos"],
            'LADATE' => $row["date_de_naissance"],
           'ID' => $row["id"],
            'DEPOSANT' => $row[ "deposant"],
            'PHOTOGRA' => $row["photographe"],
            'RELEVEUR' => $row["releveur"],
            'VERIFIEU' => $row["verificateur"],
            'DTDEPOT' => $row["date_de_depot"],
            'DTMODIF' => $row["date_de_modification"],
        ]);
     //dd($deathAct);
          // $ligne= new DeathAct();
          // $ligne=$deathAct;
          // $ligne->save();
        return $deathAct;
    }

    public function rules(): array
    {
        return [
     /* 'ID' => [
                'unique:act_mar3',
                'max:15'],
            'NOM' => [ 'max:30'],
            'PRE' => [ 'max:30'],*/
           
        ];
    }


}
