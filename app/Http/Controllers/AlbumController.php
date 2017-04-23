<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Session\Store;

use App\Models\Album;
use App\Models\Author;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Profile;
use App\Models\User;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

use DB;

class AlbumController extends Controller
{
	public function index() {

		$albums = Album::all();
		return view('admin.albums.index', compact('albums'));
	}

	public function create() {
		$authors = Author::pluck('nickname', 'id');
		$categories = Category::pluck('name', 'id');
		return view('admin.albums.create', compact('authors', 'categories'));
	}

	public function store(StoreAlbumRequest $request) {

		$album = new Album($request->all());
		$album->slug = str_slug($album->title, '-');

		if ( Input::hasFile('cover') ) {
			if ( Input::file('cover')->isValid() ) {

				$author = Author::find($request->author_id);

				/* Photo */
				$photo = new Photo();
				
				$destinationPath = $author->slug.'/cover';
				$fileInName = Input::file('cover')->getClientOriginalName();
				$success = Input::file('cover')->move($destinationPath, $fileInName);
				$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;
				$photo->url = $url;
				$photo->save();
				$album->photo()->associate($photo);

				if ($success) {
					$album->save();
				}
	            else {
	            	session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
	        		return redirect('admin/albums');
	            }
	        }
	        else {
	        	session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
	        	return redirect('admin/albums');
	        }
		}
		return redirect('admin/albums');
	}

	public function edit($request){
        $id = Crypt::decrypt($request);
        $oldAlbum = Album::findOrFail($id);

		$authors = Author::pluck('nickname', 'id');
		$categories = Category::pluck('name', 'id');

        if (count($oldAlbum) > 0){
            return view('admin.albums.edit', compact('oldAlbum', 'authors', 'categories'));         
        }
        return abort(404);
    }



    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $album = Album::findOrFail($decryptedId);
        $album->delete();

        session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/albums');
    }
}
