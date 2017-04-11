<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\Album;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;

class AlbumController extends Controller
{
    public function index() {

        $albums = Album::all();
        return view('admin.albums.index', compact('albums'));
    }

    public function create() {
    	return ;
    }
}
