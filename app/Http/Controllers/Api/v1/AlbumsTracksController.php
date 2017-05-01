<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Track;
use App\Models\Author;
use App\Models\Photo;

class AlbumsTracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($albumId)
    {
        try{
            $statusCode = 200;
            $response = [];

            $album = Album::findOrFail($albumId);
            $author = $album->author;
            $photo = $album->photo;


            $tracks = $album->tracks;

            $response = [
                    'id' => $album->id,
                    'title' => $album->title,
                    'year' => $album->year,
                    'author' => (!isset($author)) ? null :[
                        'id' => $author->id,
                        'nickname' => $author->nickname,
                        ],
                    'cover' => $photo->url,
            ];

            foreach($tracks as $track){
                $response['tracks'][] = [
                    'id' => $track->id,
                    'title' => $track->title,
                    'duration' => $track->duration,
                    'hits' => $track->hits,
                    'url' => $track->url,
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
