<?php

namespace App\Models;
//C:\xampp\htdocs\quiz\app\Models\Chapitre.php
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;
    protected $fillable = ['descriptionChapitre','nombreHeuresChapitre','dateDebutChapitre','dateCreationChapitre'];
    public function module(){
        return $this->belongsTo(
            Module::class
        );
    }
    public function questions(){
        return $this->hasMany(
            Question::class
        );
    }
}
