<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Activite');
    }
    public function index()
{
    $user = auth()->user();
    $id = $user->id;
    return view('user.index', compact('user'));
    
}
}
    ?>

