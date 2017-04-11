<!doctype html>
<html>
    @include('includes.admin.head')
    <body class="nav-md">
        <div class="container body">
          <div class="main_container">
              @include('includes.navigation.admin')
              @include('includes.admin.topnav')
              @yield('content')
          </div>
        </div>
        @include('includes.admin.footer')
    </body>
</html>