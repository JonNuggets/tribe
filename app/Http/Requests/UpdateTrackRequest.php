<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class UpdateTrackRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()){
            $profil = Profile::find(Auth::user()->profile_id)->name;
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
            'title' => 'required',
            'duration' => 'sometimes|date_format:H:i',
            'track_type_id' => 'required|numeric',
            'author_id' => 'required|numeric',
            'year' => 'sometimes|digits:4'
        ];
    }
}
