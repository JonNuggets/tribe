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

use App\Models\Author;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;


// use App\Http\Requests\StoreAuthorRequest;

use DB;

class AuthorController extends Controller
{
    public function index() {

        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create() {
		return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request) {

		$author = new Author($request->all());
		$author->slug = str_slug($author->nickname, '-');
		$author->save();

		return redirect('admin/authors');
    }

    public function edit($request){
        $id = Crypt::decrypt($request);
        $oldAuthor = Author::findOrFail($id);

        if (count($oldAuthor) > 0){
            return view('admin.authors.edit', compact('oldAuthor'));         
        }
        return abort(404, "Sorry Can't find author");
    }

    public function update(UpdateAuthorRequest $request, $id) {
        $decryptedId = Crypt::decrypt($id);
        $action = $request->action;
        $author = Author::findOrFail($decryptedId);

        if ($action){
            switch ($action) {
                case "Enregistrer":
                    try {
                    	$author->slug = str_slug($request->nickname, '-');
                        $author->update($request->all());
                        session()->flash('flash_message', "L'entité a été mise à jour avec succès.");
                    }
                    catch(QueryException $e){
                        session()->flash('flash_message_warning', "Le code pour l'entité existe déjà dans le système.");
                    }
                    break;
                case "Annuler":
                    break;
                case "Supprimer":
                    $author->delete();
                    session()->flash('flash_message', "L'entité a été supprimée avec succès.");
                    break;
            }
            return redirect('admin/authors');
        }
    }

    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $author = Author::findOrFail($decryptedId);
        $author->delete();

        session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/authors');
    }
}
