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

use App\Models\Track;
use App\Models\Photo;
use App\Models\TrackType;
use App\Models\Album;
use App\Models\Author;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;

use DB;

class TrackController extends Controller
{
	public function index() {
		$tracks = Track::all();
		return view('admin.tracks.index', compact('tracks'));
	}

	public function create() {
		$authors = Author::pluck('nickname', 'id');
		$trackTypes = TrackType::pluck('name', 'id');
		$albums = Album::pluck('title', 'id');
		return view('admin.tracks.create', compact('authors', 'trackTypes', 'albums'));
	}

	public function store(StoreTrackRequest $request) {

		$track = new Track($request->all());
		$track->slug = str_slug($track->title, '-');

		if ( Input::hasFile('track') && Input::hasFile('cover') ) {
			if (Input::file('track')->isValid() && Input::file('cover')->isValid()) {

				$author = Author::find($request->author_id);

				/* Photo */
				$photo = new Photo();
				
				$destinationPath = $author->slug.'/cover';
				$fileInName = Input::file('cover')->getClientOriginalName();
				$success = Input::file('cover')->move($destinationPath, $fileInName);
				$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;
				$photo->url = $url;
				$photo->save();
				$track->photo()->associate($photo);

				/* Track */
				if (!empty($request->album_id)) {
					$album = Album::find($request->album_id);
					$destinationPath = $author->slug.'/'.$album->slug;
				}
				else {
					$destinationPath = $author->slug.'/singles';
				}

				$fileInName = Input::file('track')->getClientOriginalName();
				$success = Input::file('track')->move($destinationPath, $fileInName);
				$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;

				if ($success) {
					$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;
					$track->url = $url;
					$track->save();
				}
	            else {
	            	session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
	        		return redirect('admin/tracks');
	            }
	        }
	        else {
	        	session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
	        	return redirect('admin/tracks');
	        }
		}
		return redirect('admin/tracks');
	}

	public function edit($request){
        $id = Crypt::decrypt($request);
        $oldTrack = Track::findOrFail($id);

		$authors = Author::pluck('nickname', 'id');
		$trackTypes = TrackType::pluck('name', 'id');
		$albums = Album::pluck('slug', 'id');

        if (count($oldTrack) > 0){
            return view('admin.tracks.edit', compact('oldTrack', 'authors', 'trackTypes', 'albums'));         
        }
        return abort(404);
    }

     public function update(UpdateTrackRequest $request, $id) {
        $decryptedId = Crypt::decrypt($id);
        $action = $request->action;
        $track = Track::findOrFail($decryptedId);
        
        $oldTrack = $track;

        if ($action){
            switch ($action) {
                case "Enregistrer":
                    try {
						$track->update($request->all());
						$track->slug = str_slug($request->title);
						$author = Author::find($request->author_id);

						if ( Input::hasFile('track') || Input::hasFile('cover') ) {
							if ( null !== Input::file('cover') && Input::file('cover')->isValid()) {
								/* Photo */
								$photo = new Photo();
								
								$destinationPath = $author->slug.'/cover';
								$fileInName = Input::file('cover')->getClientOriginalName();
								$success = Input::file('cover')->move($destinationPath, $fileInName);
								$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;
								$photo->url = $url;
								$photo->save();
								$track->photo()->associate($photo);
							}

							if (null !== Input::file('track') && Input::file('track')->isValid()) {
								/* Track */
								if (isset($request->album_id)) {
									$album = Album::find($request->album_id);
									$destinationPath = $author->slug.'/'.$album->slug;
								}
								else {
									$destinationPath = $author->slug.'/singles';
								}

								$fileInName = Input::file('track')->getClientOriginalName();
								$success = Input::file('track')->move($destinationPath, $fileInName);
								$url = pathinfo ( $success, PATHINFO_DIRNAME ).'/'.$fileInName;
								$track->url = $url;
							}

							if ($success) {
								$track->save();
							}
							else {
								session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
								return redirect('admin/tracks');
							}
						}
						else {
							session()->flash('flash_message_warning', "Le fichier que vous essayez de déposer est corrompu.");
							return redirect('admin/tracks');
						}
						session()->flash('flash_message', "L'entité a été mise à jour avec succès.");
					}
					catch(QueryException $e){
						session()->flash('flash_message_warning', "Le code pour l'entité existe déjà dans le système.");
					}
                    break;
                case "Annuler":
                    break;
                case "Supprimer":
                    $trackType->delete();
                    session()->flash('flash_message', "L'entité a été supprimée avec succès.");
                    break;
            }
            return redirect('admin/tracks');
        }
    }

    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $track = Track::findOrFail($decryptedId);
        $track->delete();

        session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/tracks');
    }
}
