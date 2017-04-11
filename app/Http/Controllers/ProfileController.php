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

class ProfileController extends Controller
{
    public function index() {

        $profiles = Profile::all();
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create() {
    	return ;
    }
}
