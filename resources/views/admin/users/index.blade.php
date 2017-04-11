@extends('layouts.admin')

@section('title')
  Tribe | Gestion des utilisateurs
@stop

@section('content')
    <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Utilisateurs <small>Gestion des utilisateurs</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <button type="button"  onclick="location.href='{{ URL::route('users.create') }}'" class="btn btn-default btn-red-tribe submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un utilisateur
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
                  <th>Prénoms</th>
                  <th>Nom</th>
                  <th>Nom d'utilisateur</th>
                  <th>Email</th>
                  <th>Profil</th>
                  <th>État</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $users as $user )
                <?php
                  if ($user->active == 1) {
                    $userStatut = 'Activé';
                  }
                  else {
                    $userStatut = 'Désactivé';
                  }
                ?>
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->lastname }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ \App\Models\Profile::find($user->profile_id)->name }}</td>
                  <td>{{ $userStatut }}</td>
                  <td>
                    <a href="{{ url( 'admin/users/edit/' . Crypt::encrypt($user->id)), ['class' => 'btn btn-xs-tribe btn-default'] }}" class="btn btn-xs-tribe btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ url( 'admin/users/edit/' . Crypt::encrypt($user->id)) }}" class="btn btn-xs-tribe btn-default" data-button-type="delete"><i class="fa fa-trash"></i></a>
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