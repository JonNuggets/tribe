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
        <h3>Modifier un type d'abonnement</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">
          {{ Form::model($oldSubscriptionType, array( 'route' => array('subscription_types.update', Crypt::encrypt($oldSubscriptionType->id)), 'class' => 'form-horizontal form-label-left', 'method' => 'PUT' ) ) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('name', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('description', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Offre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::textarea('offer', null, array('class' => 'form-control ckeditor col-md-7 col-xs-12', 'required' => 'required')) }}
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prix <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{ Form::text('price', null, array('class' => 'form-control col-md-7 col-xs-12', 'required' => 'required')) }}
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