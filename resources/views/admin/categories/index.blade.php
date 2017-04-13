@extends('layouts.admin')

@section('title')
  Tribe | Gestion des catégories
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Catégories <small>Gestion des catégories</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('categories.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un catégorie
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
                @foreach ( $categories as $category )
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>
                    <a href="{{ url( 'admin/categories/edit/' . Crypt::encrypt($category->id)) }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/categories/delete/' . Crypt::encrypt($category->id)) }}" class="btn btn-xs-tribe btn-default" onclick="return confirmDelete()"><i class="fa fa-trash"></i></a>
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