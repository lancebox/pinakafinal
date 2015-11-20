<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Point Of Sale & Inventory System with Economic Order Quantity</title>

  <!-- START CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- END CSS  -->
  </head>
  

  <body background="">

    <!-- Menu Bar  -->
    <!-- Dropdown USer Account  -->

    <ul id="dropdown1" class="dropdown-content">
      <li><a href="settings">Account Settings</a></li>
      <li class="divider"></li>
      <li><a href="{{ URL::to('logout') }}">Sign Out</a></li>
    </ul>

    <!-- Navigation -->
    <nav class="grey" role="navigation">
      <div class="nav-wrapper">
        <a href="#"><i class="tiny material-icons left"> </i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="#!" class="left brand-logo"><img src="../../pictures/LOGO2.gif" height="65 px" width="170 px"></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="/dashboard"><i class="tiny material-icons left">dashboard</i>Dashboard</a></li>
          <li><a href="/users"><i class="tiny material-icons left">perm_identity</i>Users</a></li>
          <li><a href="/np"><i class="tiny material-icons left">shop</i>Products</a></li>
          <li><a href="/sales"><i class="tiny material-icons left">assessment</i>Sales</a></li>
          <li><a href="/suppliers"><i class="tiny material-icons left">contacts</i>Suppliers</a></li>
          <!-- Dropdown Trigger -->
          <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="tiny material-icons right">arrow_drop_down</i>Hi, {{ Auth::user()->user_name}}</a>
          </li>
        </ul>

      <!-- For Mobile -->
        <ul class="side-nav" id="mobile-demo">
        <br>
          <li><a href="/dashboard"><i class="tiny material-icons left">dashboard</i>Dashboard</a></li>
          <li><a href="/users"><i class="tiny material-icons left">perm_identity</i>Users</a></li>
          <li><a href="/np"><i class="tiny material-icons left">shop</i>Products</a></li>
          <li><a href="/sales"><i class="tiny material-icons left">assessment</i>Sales</a></li>
          <li><a href="/suppliers"><i class="tiny material-icons left">contacts</i>Suppliers</a></li>
          <li><a href="/notifications.html"><i class="tiny material-icons left">add_alert</i>Notifications</a></li>
          <li><a href="#"><i class="tiny material-icons left">settings</i>Account Settings</a></li>
          <li><a href="{{ URL::to('logout') }}"><i class="tiny material-icons left">power_settings_new</i>Sign Out</a></li>
        </ul>
      </div>
    </nav>
    <!-- /Navigation -->
    
    @yield('content')
    
  <!-- START Scripts-->
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
   <script type="text/javascript" src="../../js/materialize.min.js"></script>
  <script type="text/javascript" src="../../js/init.js"></script>
  <!-- END Scripts-->
  </body>
</html>
