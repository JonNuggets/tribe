<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Session\Store;

use App\Models\TrackType;
use App\Models\User;
use App\Models\Profile;

use App\Http\Requests\StoreTrackTypeRequest;
use App\Http\Requests\UpdateTrackTypeRequest;

use DB;

class TrackTypeController extends Controller
{
    public function index() {

        $track_types = TrackType::all();
        return view('admin.track_types.index', compact('track_types'));
    }

    public function create() {
		return view('admin.track_types.create');
    }

    public function store(StoreTrackTypeRequest $request) {
		$slug = str_slug($request->input('name'));

		$trackType = new TrackType($request->all());
		$trackType->slug = $slug;
		$trackType->save();

		// session()->flash('flash_message', 'La nouvelle entité a été crée avec succès.');
		return redirect('admin/track_types');
    }

    public function edit($request){
        $id = Crypt::decrypt($request);
        $oldTrackType = TrackType::findOrFail($id);

        if (count($oldTrackType) > 0){
            return view('admin.track_types.edit', compact('oldTrackType'));         
        }
        return abort(404);
    }

    public function update(UpdateTrackTypeRequest $request, $id) {
        $decryptedId = Crypt::decrypt($id);
        $action = $request->action;
        $trackType = TrackType::findOrFail($decryptedId);

        if ($action){
            switch ($action) {
                case "Enregistrer":
                    try {
                        $trackType->name = $request->name;
                        $trackType->slug = str_slug($request->name);
                        $trackType->save();
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
            return redirect('admin/track_types');
        }
    }

    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $trackType = TrackType::findOrFail($decryptedId);
        $trackType->delete();

        session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/track_types');
    }
}
