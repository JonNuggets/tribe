<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\User;
use App\Models\Profile;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\CheckUserRequest;

use DB;

class UserController extends Controller
{
    public function check (CheckUserRequest $request){

		if (Auth::attempt(['email' => $request['username'], 'password' => $request['password'], 'active' => 1])) {
			Auth::attempt(['email' => $request['username'], 'password' => $request['password'], 'active' => 1]);
			$stats = 'Ceci est un test';
			return view('admin.home', compact('stats'));
		}
		return redirect('admin/login');
    }

    public function index() {

        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create() {

        $profiles = Profile::all();
        return view('admin.users.create', compact('profiles'));
    }

    public function store(StoreUserRequest $request){

        $user = new User($request->all());
        $user->password = bcrypt($request->input('password'));
        Profile::find($request->input('profile_id'))->users()->save($user);
        //session()->flash('flash_message', 'Le nouvel utilisateur a été crée avec succès.');
        return redirect('admin/users');
    }


    public function logout(){
        if (Auth::check()){
            Auth::logout();
            Session::flush();
        }
        return redirect('/');
    }
}
