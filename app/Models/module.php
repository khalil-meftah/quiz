<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['descriptionModule','nombreHeuresModule','dateDebutModule','dateCreationModule'];
    public function chapitre(){
        return $this->hasMany(
            Chapitre::class
        );
    }
    
}
