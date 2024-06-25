<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VinculoEmpregaticio;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function get_userList(){
        $users = User::with('vinculo')->get();
        return view('userList',[
            'users'=>$users
        ]);
    }
}
