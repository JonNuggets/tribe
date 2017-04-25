<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Track;
use App\Models\Album;
use App\Models\Author;
use App\Models\Photo;

class HomeController extends Controller
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

            $albums = Album::all();

            foreach($albums as $album){

                $author = $album->author;
                $photo = $album->photo;

                $response['albums'][] = [
                    'id' => $album->id,
                    'title' => $album->title,
                    'year' => $album->year,
                    'author' => (!isset($author)) ? null :[
                        'id' => $author->id,
                        'nickname' => $author->nickname,
                        // 'photo' => $author->image,
                        ],
                    'cover' => $photo->url,
                ];
            }

            $tracks = Track::all();

            foreach($tracks as $track){

                $author = $track->author;
                $album = $track->album;
                $albumPhoto = (!isset($album)) ? null : $album->photo;
                $photoTrack = $track->photo;

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
                        'cover' => $albumPhoto->url,
                        ],
                    'cover' => $photoTrack->url,
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
