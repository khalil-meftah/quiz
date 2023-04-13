<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapitre extends Model
{
    use HasFactory;
    protected $fillable = ['descriptionChapitre','nombreHeuresChapitre','dateDebutChapitre','dateCreationChapitre'];

}
