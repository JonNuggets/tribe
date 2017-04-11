<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrackRequest;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Models\Track;
use App\Models\User;
use DB;


class TrackController extends Controller
{
	public function index() {
		// $singleTracks = Track::where('author_id', 5)
		// 		->where('album_id', null)
		// 		->orderBy('id', 'desc')
		// 		->get();
		// dd($singleTracks);
		// $albumTracks = Track::where('author_id', 5)
		// 		->where('album_id', '!=', null)
		// 		->orderBy('id', 'desc')
		// 		->get();

		// dd($albumTracks);
		$tracks = Track::all();
		return view('admin.tracks.index', compact('tracks'));
    }
}
