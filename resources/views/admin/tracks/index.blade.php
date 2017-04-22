@extends('layouts.admin')

@section('title')
  Tribe | Gestion des pistes
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pistes <small>Gestion des pistes</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('tracks.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un piste
          </button>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Type</th>
                  <th>Album</th>
                  <th>Statut</th>
                  <th>Date d'ajout</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $tracks as $track )
                <?php 
                  $author = \App\Models\Author::find($track->author_id);
                  $trackType = \App\Models\TrackType::find($track->track_type_id);
                  $album = \App\Models\Album::find($track->album_id);
                  if ( empty($album) ) {
                    $albumTitle = '';
                  }
                  else {
                    $albumTitle = $album->title;
                  }
                ?>
                <tr>
                  <td>{{ $track->title }}</td>
                  <td>{{ $author->nickname }}</td>
                  <td>{{ $trackType->name }}</td>
                  <td>{{ $albumTitle }}</td>
                  <td>{{ $track->statut }}</td>
                  <td>{{ $track->updated_at }}</td>
                  <td>
                    <a href="{{ url( 'admin/tracks/edit/' . Crypt::encrypt($track->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/tracks/delete/' . Crypt::encrypt($track->id)) }}" class="btn btn-xs-tribe btn-default" onclick="return confirmDelete()"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@stop