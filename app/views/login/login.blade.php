<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Point Of Sale & Inventory System with Economic Order Quantity</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>
  <body class = "grey darken-1">

  <!-- Header  -->
  <br>
  <br>

    <!-- Login -->
    <div class="section">
      <div class="row">
        <br>
        <br>
    
          <div class="col s12 l4 m4 offset-l4 offset-m4">
            <div class="card grey lighten-1">
              <div class="card-content card-medium white-text center">
                <a class="left brand-logo"><img src="../pictures/LOGO2.gif" height="100%" width="100%"></a>     
                 {{ Form::open(array('url' => 'login' )) }}
                 <form>
                  <div id="logininput">
                          
                          <div class="@if ($errors->has('email')) red-text text-darken-3 @endif">
                          <input name="email" placeholder="Email" type="email" required="" maxlength="40" value="{{ Input::old('email') }}">
                          @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                          </div>

                          <div class="@if ($errors->has('password')) red-text text-darken-3 @endif">      
                          <input name="password" placeholder="Password" type="password" required="" maxlength="40">
                          @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                          </div>

                          @if(Session::has('credential-error'))
                          <div class="alert-box success red-text text-darken-3">
                          <h6>{{ Session::get('credential-error') }}</h6>
                          </div>
                          @endif

                          @if(Session::has('status-error'))
                          <div class="alert-box success red-text text-darken-3">
                          <h6>{{ Session::get('status-error') }}</h6>
                          </div>
                          @endif
                    
                      </div>
                      <div class="right-align">
                        {{ Form::button('Login', ['class' => 'waves-effect waves-light btn teal lighten-1', 'type'=>'submit']) }}
                        {{ Form::close() }}
                      </div>
                  <br>
                  <a class="teal-text text-lighten-1" href="/password"><h6>Forgot password?<h6></a>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    <!-- /Login -->
           

  <!--  Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

  </body>
</html>
