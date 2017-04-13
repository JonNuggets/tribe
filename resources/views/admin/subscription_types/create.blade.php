@extends('layouts.admin')

@section('title')
  Tribe | Gestion des types d'abonnement
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ajouter un type d'abonnement</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">
            {{ Form::open( array( 'route' => 'subscription_types.store', 'class' => 'form-horizontal form-label-left' ) ) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('name', '', array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('description', '', array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Offre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::textarea('offer', '', array('class' => 'form-control ckeditor col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prix <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('price', '', array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
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