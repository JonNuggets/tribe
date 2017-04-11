@extends('layouts.admin')

@section('title')
  Tribe | Gestion des abonnements
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Abonnements <small>Gestion des abonnements</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('subscriptions.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un abonnement
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
                  <th>Utilisateur</th>
                  <th>Type d'abonnement</th>
                  <th>Début</th>
                  <th>Fin</th>
                  <th>État</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $subscriptions as $subscription )
                <?php 
                  $user = \App\Models\User::find($subscription->user_id);
                  $subscriptionType = \App\Models\SubscriptionType::find($subscription->subscription_type_id);
                  if ($subscription->current_value == 1) {
                    $state = 'Actif';
                  }
                  else {
                    $state = 'Inactif';
                  }
                ?>
                <tr>
                  <td>{{ $user->name.' '.$user->lastname }}</td>
                  <td>{{ $subscriptionType->name }}</td>
                  <td>{{ $subscription->starting_date }}</td>
                  <td>{{ $subscription->ending_date }}</td>
                  <td>{{ $state }}</td>
                  <td>
                    <a href="{{ url( 'admin/subscriptions/edit/' . Crypt::encrypt($subscription->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/subscriptions/edit/' . Crypt::encrypt($subscription->id)) }}" class="btn btn-xs-tribe btn-default" data-button-type="delete"><i class="fa fa-trash"></i></a>
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