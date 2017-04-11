@extends('layouts.admin')

@section('title')
  Tribe | Gestion des types de piste
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Types de piste</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('track_types.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un type
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
                  <th>Libellé</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $track_types as $track_type )
                <tr>
                  <td>{{ $track_type->name }}</td>
                  <td>
                    <a href="{{ url( 'admin/track_types/edit/' . Crypt::encrypt($track_type->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/track_types/edit/' . Crypt::encrypt($track_type->id)) }}" class="btn btn-xs-tribe btn-default" data-button-type="delete"><i class="fa fa-trash"></i></a>
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