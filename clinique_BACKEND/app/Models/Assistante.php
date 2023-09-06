<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistante extends Model
{
    use HasFactory;
    protected $fillable = ['Matricule'];
    public function employe(){
        return $this->belongsTo(Employes::class);
    }
}
