<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\Author;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;

class AuthorController extends Controller
{
    public function index() {

        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create() {
    	return ;
    }
}
