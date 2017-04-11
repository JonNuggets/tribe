<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
<!--     <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
    </div> -->

    <div class="clearfix"></div>
    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
<!--           <li {{{ (Request::is('admin/dashboard') ? 'class=active' : '') }}}> -->
          <li>
            <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-laptop"></i> Tableau de bord</a>
          </li>
          <li >
            <a><i class="fa fa-video-camera"></i> Vidéos <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('videos.index') }}">Listes des videos</a></li>
              <li><a href="{{ URL::route('videos.create') }}">Ajouter une vidéo</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-music"></i> Musique <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('tracks.index') }}">Liste des pistes</a></li>
              <li><a href="{{ URL::route('tracks.create') }}">Ajouter une piste</a></li>
              <li><a href="{{ URL::route('albums.index') }}">Albums</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-dashboard"></i> Auteurs <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('authors.index') }}">Liste des auteurs</a></li>
              <li><a href="{{ URL::route('authors.create') }}">Ajouter un auteur</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-users"></i>Utilisateurs <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('users.index') }}">Tous les utilisateurs</a></li>
              <li><a href="{{ URL::route('users.create') }}">Ajouter un utilisateur</a></li>
              <li><a href="{{ URL::route('profiles.index') }}">Profiles</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Configuration</h3>
        <ul class="nav side-menu">
          <li>
            <a>Abonnements <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('subscriptions.index') }}">Liste des abonnements</a></li>
              <li><a href="{{ URL::route('subscriptions.create') }}">Ajouter un abonnement</a></li>
              <li><a href="{{ URL::route('subscription_types.index') }}">Types d'abonnement</a></li>
            </ul>
          </li>
          <li>
            <a> Musique <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ URL::route('categories.index') }}">Catégories</a></li>
              <li><a href="{{ URL::route('track_types.index') }}">Types de pistes</a></li>
            </ul>
          </li>
          <!-- <li>
            <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#level1_1">Level One</a>
                <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                    </li>
                    <li><a href="#level2_1">Level Two</a>
                    </li>
                    <li><a href="#level2_2">Level Two</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#level1_2">Level One</a>
                </li>
            </ul>
          </li> -->
        </ul>
      </div>

    </div>
  </div>
</div>