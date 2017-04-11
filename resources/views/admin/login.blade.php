<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tribe | Connexion</title>

    <!-- Bootstrap -->
    {{ Html::style('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('gentelella/vendors/nprogress/nprogress.css') }}
    {{ Html::style('gentelella/vendors/animate.css/animate.min.css') }}

    <!-- Custom Theme Style -->
    {{ Html::style('gentelella/build/css/custom.css') }}
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {{ Form::open( array( 'route' => 'users.check', 'class' => 'form-signin' ) ) }}
            <form>
              <img src="{{ asset('img/logo-tribe.png') }}" class="logo"/>
              <div>
                {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => "Nom d'utilisateur")) }}
              </div>
              <div>
                {{ Form::password('password', [ 'class' => 'form-control','placeholder' => 'Mot de passe']) }}
              </div>
              <div>
                <button class="btn btn-default btn-red-tribe submit" type="submit">Se connecter</button>
                <a class="reset_pass" href="#">Mot de passe oublié?</a>
              </div>
              <div class="clearfix"></div>
            </form>
            {{ Form::close() }}
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
