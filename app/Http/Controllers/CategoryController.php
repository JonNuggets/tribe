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

use App\Models\Category;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use DB;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
    	return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request) {
		$slug = str_slug($request->input('name'));

		$category = new Category($request->all());
		$category->slug = $slug;
		$category->save();

		// session()->flash('flash_message', 'La nouvelle entité a été crée avec succès.');
		return redirect('admin/categories');
    }

    public function edit($request){
        $id = Crypt::decrypt($request);
        $oldCategory = Category::findOrFail($id);

        if (count($oldCategory) > 0){
            return view('admin.categories.edit', compact('oldCategory'));         
        }
        return abort(404);
    }

    public function update(UpdateCategoryRequest $request, $id) {
        $decryptedId = Crypt::decrypt($id);
        $action = $request->action;
        $category = Category::findOrFail($decryptedId);

        if ($action){
            switch ($action) {
                case "Enregistrer":
                    try {
                        $category->name = $request->name;
                        $category->slug = str_slug($request->name);
                        $category->save();
                        session()->flash('flash_message', "L'entité a été mise à jour avec succès.");
                    }
                    catch(QueryException $e){
                        session()->flash('flash_message_warning', "Le code pour l'entité existe déjà dans le système.");
                    }
                    break;
                case "Annuler":
                    break;
                case "Supprimer":
                    $category->delete();
                    session()->flash('flash_message', "L'entité a été supprimée avec succès.");
                    break;
            }
            return redirect('admin/categories');
        }
    }

    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $category = Category::findOrFail($decryptedId);
        $category->delete();

        session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/categories');
    }
}
