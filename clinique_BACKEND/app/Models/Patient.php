<?php

namespace App\Models;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['Numero','CIN','Nom','Prenom','Adresse','Matricule','Tel','Email'];
    protected $primaryKey = 'Numero';
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }


    public function consultations(){
        return $this->belongsTo(Consultation::class);
    }


}
