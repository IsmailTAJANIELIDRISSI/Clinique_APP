<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = ['NumeroConsultation','BlocOperatoire','DateDebut','DateFin','Observation'];
    
    public function employes(){
        return $this->belongsToMany(Employe::class);
    }
}
