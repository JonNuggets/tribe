<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;


class SubscriptionController extends Controller
{
    public function index() {

        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create() {
    	return ;
    }
}
