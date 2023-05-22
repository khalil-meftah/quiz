<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function reponses(){
        return $this->hasMany(Reponse::class);
    }
    public function chapitre(){
        return $this->belongsTo(Chapitre::class);
    }
    // public function isApproved()
    // {
    //     return $this->status === 'approved';
    // }
}
