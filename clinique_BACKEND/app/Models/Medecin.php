<?php

namespace App\Models;

use App\Models\Employe;
use App\Models\Patient;
use App\Models\Operation;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['Matricule','Nom','Prenom','Specialite','Service','Tarif','Tel','Email'];
    protected $primaryKey = 'Matricule';
    public function patients(){
        return $this->hasMany(Patient::class);
    }
    public function consultations(){
        return $this->hasMany(Consultation::class);
    }
    public function operations(){
        return $this->hasMany(Operation::class);
    }
    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
