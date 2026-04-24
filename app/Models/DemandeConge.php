<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;
    protected $table = 'demandeconges';
    protected $fillable = [
        'userid',
        'matriculemanager',
        'duree',
        'titre',
        'datedebut',
        'datefin',
        'adresse',
        'typeConge',
        'status',

    ];

    // DemandeConge.php
public function user()
{
    return $this->belongsTo(User::class, 'userid'); // 'userid' est la colonne qui fait référence à l'utilisateur
}

public function manager()
{
    return $this->belongsTo(User::class, 'matriculemanager', 'matricule');
}

}
