<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        if (Auth::check()){
            $profil = Profil::find(Auth::user()->profile_id)->name;
            if ( ($profil == 'Admin') || ($profil == 'SAdmin') ){
                return true;
            }
            return false;        
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile_id' => 'required',
            'email' => 'required|email',
            'active' => 'boolean',
            'username' => 'required',
            'password' => 'required|same:retype_password'
        ];
    }
}
