<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\SubscriptionType;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;

class SubscriptionTypeController extends Controller
{
    public function index() {

        $subscription_types = SubscriptionType::all();
        return view('admin.subscription_types.index', compact('subscription_types'));
    }

    public function create() {
    	return ;
    }
}
