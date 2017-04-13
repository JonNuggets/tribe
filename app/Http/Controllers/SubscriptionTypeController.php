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

use App\Models\SubscriptionType;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreSubscriptionTypeRequest;
use App\Http\Requests\UpdateSubscriptionTypeRequest;

use DB;

class SubscriptionTypeController extends Controller
{
    public function index() {

        $subscription_types = SubscriptionType::all();
        return view('admin.subscription_types.index', compact('subscription_types'));
    }

    public function create() {
		return view('admin.subscription_types.create');
    }

    public function store(StoreSubscriptionTypeRequest $request) {

		$subscriptionType = new SubscriptionType($request->all());
		$subscriptionType->save();

		return redirect('admin/subscription_types');
    }

    public function edit($request){
        $id = Crypt::decrypt($request);
        $oldSubscriptionType = SubscriptionType::findOrFail($id);

        if (count($oldSubscriptionType) > 0){
            return view('admin.subscription_types.edit', compact('oldSubscriptionType'));         
        }
        return abort(404);
    }

    public function update(UpdateSubscriptionTypeRequest $request, $id) {
        $decryptedId = Crypt::decrypt($id);
        $action = $request->action;
        $subscriptionType = SubscriptionType::findOrFail($decryptedId);

        if ($action){
            switch ($action) {
                case "Enregistrer":
                    try {
                        $subscriptionType->update($request->all());
                        session()->flash('flash_message', "L'entité a été mise à jour avec succès.");
                    }
                    catch(QueryException $e){
                        session()->flash('flash_message_warning', "Le code pour l'entité existe déjà dans le système.");
                    }
                    break;
                case "Annuler":
                    break;
                case "Supprimer":
                    $subscriptionType->delete();
                    session()->flash('flash_message', "L'entité a été supprimée avec succès.");
                    break;
            }
            return redirect('admin/subscription_types');
        }
    }

    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $subscriptionType = SubscriptionType::findOrFail($decryptedId);
        $subscriptionType->delete();

        // session()->flash('flash_message', "La categorie a été supprimée avec succès.");
        return redirect('admin/subscription_types');
    }
}
