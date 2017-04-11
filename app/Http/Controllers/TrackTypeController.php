<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\TrackType;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;

class TrackTypeController extends Controller
{
    public function index() {

        $track_types = TrackType::all();
        return view('admin.track_types.index', compact('track_types'));
    }

    public function create() {
    	return ;
    }
}
