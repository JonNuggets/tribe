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
        <h3>Modifier un auteur</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            {{ Form::model($oldAuthor, array( 'route' => array('authors.update', Crypt::encrypt($oldAuthor->id)), 'class' => 'form-horizontal form-label-left', 'method' => 'PUT' ) ) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénoms <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('firstname', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Noms <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('lastname', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pseudo <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('nickname', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Actif
                </label>

                <div class="col-md- col-sm-6 col-xs-12">
                  <div class="checkbox">
                    <label>
                      {{ Form::checkbox('statut', 1, null, array('id'=>'remember', 'class' => 'flat', 'type' => 'checkbox')) }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {!! Form::submit( 'Supprimer', array( 'class' => 'btn btn-default', 'onclick' => 'return confirmDelete()', 'name' => 'action', 'value' => 'delete' ) ) !!}
                  {!! Form::submit( 'Enregistrer', array( 'class' => 'btn btn-success', 'name' => 'action', 'value' => 'update' ) ) !!}
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@stop