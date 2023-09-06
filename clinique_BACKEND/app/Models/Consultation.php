<?php

namespace App\Models;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = ['Numero','TypeConsultation','Objet','Matricule','Observation','Date'];
    protected $primaryKey = 'NumeroConsultation';
    
    public function operation(){
        return $this->hasOne(Operation::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }

}
