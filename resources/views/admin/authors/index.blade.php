@extends('layouts.admin')

@section('title')
  Tribe | Gestion des auteurs
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Auteurs <small>Gestion des auteurs</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('authors.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter un auteur
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
                  <th>Artiste</th>
                  <th>Nom</th>
                  <th>Slug</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $authors as $author )
                <tr>
                  <td>{{ $author->nickname }}</td>
                  <td>{{ $author->firsname.' '.$author->lastname }}</td>
                  <td>{{ $author->slug }}</td>
                  <td>{{ $author->statut }}</td>
                  <td>
                    <a href="{{ url( 'admin/authors/edit/' . Crypt::encrypt($author->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/authors/delete/' . Crypt::encrypt($author->id)) }}" class="btn btn-xs-tribe btn-default" onclick="return confirmDelete()"><i class="fa fa-trash"></i></a>
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