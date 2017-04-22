<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Author;
use App\Models\Photo;
use App\Models\Track;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $statusCode = 200;
            $response = [];

            $tracks = Track::all();

            foreach($tracks as $track){

                $author = $track->author;
                $album = $track->album;
                $photo = $track->photo;

                $response['tracks'][] = [
                    'id' => $track->id,
                    'title' => $track->title,
                    'duration' => $track->duration,
                    'year' => $track->year,
                    'hits' => $track->hits,
                    'url' => $track->url,
                    'author' => [
                        'id' => $author->id,
                        'nickname' => $author->nickname,
                        // 'photo' => $author->image,
                        ],
                    'album' => (!isset($album)) ? null : [
                        'id' => $album->id,
                        'title' => $album->title,
                        // 'cover' => $album->photo_id,
                        ],
                    'cover' => $photo->url,
                ];
            }

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
