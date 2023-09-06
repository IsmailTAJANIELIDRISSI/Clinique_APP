<?php

namespace App\Models;

use App\Models\Infermier;
use App\Models\Operation;
use App\Models\Assistante;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','typeEmploi','code'];
    protected $primaryKey = 'Matricule';

    public function departement(){
        return $this-belongsTo(Departement::class);
    }
    public function infermier(){
        return $this-hasOne(Infermier::class);
    }
    public function assistante(){
        return $this-hasOne(Assistante::class);
    }
    public function operations(){
        return $this->belongsToMany(Operation::class);
    }
}
