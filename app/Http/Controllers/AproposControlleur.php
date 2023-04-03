<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AproposControlleur extends Controller
{

    public $users;
    public function __construct()
    {
        $this->users=User::getAllUsers();
        $this->middleware('auth');
    }

    public function index(){
        return view('apropos.index');
    }




}
