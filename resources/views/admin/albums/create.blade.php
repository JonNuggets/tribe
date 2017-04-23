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
        <h3>Ajouter un album</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            {{ Form::open( array( 'route' => 'albums.store', 'class' => 'form-horizontal form-label-left', 'files' => true ) ) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Cover <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::file('cover', array('class' => 'form-control col-md-7 col-xs-12')) }}
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Auteur <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('author_id', $authors, null, array( 'class' => 'form-control')) }}
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Titre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('title', '', array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Année </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('year', '', array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Publié
                </label>

                <div class="col-md- col-sm-6 col-xs-12">
                  <div class="checkbox">
                    <label>
                      {{ Form::checkbox('published', 1, 1, array('id'=>'remember', 'class' => 'flat', 'type' => 'checkbox')) }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {!! Form::submit( 'Enregistrer', array( 'class' => 'btn btn-success',  'name' => 'action', 'value' => 'save' ) ) !!}
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