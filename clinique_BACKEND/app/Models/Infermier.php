<?php

namespace App\Models;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Infermier extends Model
{
    use HasFactory;
    protected $fillable = ['Matricule','nom','prenom','service'];
    
    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
