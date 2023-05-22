<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    public function question(){
        return $this->belongsTo(Question::class);
    }
    // public function isApproved()
    // {
    //     return $this->status === 'approved';
    // }
}
