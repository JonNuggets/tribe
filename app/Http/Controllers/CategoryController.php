<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

use App\Models\Category;
use App\Models\User;
use App\Models\Profile;

// use App\Http\Requests\StoreAuthorRequest;

use DB;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
    	return ;
    }
}
