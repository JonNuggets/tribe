@extends('layouts.admin')

@section('title')
  Tribe | Gestion des albums
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Albums <small>Gestion des albums</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('albums.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un album
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
                  <th>Slug</th>
                  <th>Statut</th>
                  <th>Date d'ajout</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $albums as $album )
                <?php 
                  $author = \App\Models\Author::find($album->author_id);
                  if ($album->published == 1) {
                    $isPublished = 'Publié';
                  }
                  else {
                    $isPublished = 'En attente';
                  }
                ?>
                <tr>
                  <td>{{ $album->title }}</td>
                  <td>{{ $author->nickname }}</td>
                  <td>{{ $album->slug }}</td>
                  <td>{{ $isPublished }}</td>
                  <td>{{ $album->updated_at }}</td>
                  <td>
                    <a href="{{ url( 'admin/albums/edit/' . Crypt::encrypt($album->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/albums/edit/' . Crypt::encrypt($album->id)) }}" class="btn btn-xs-tribe btn-default" data-button-type="delete"><i class="fa fa-trash"></i></a>
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