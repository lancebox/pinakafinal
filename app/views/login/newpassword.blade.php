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
    <!-- New password -->
    <div class="section">
      <div class="row">
      <br>
      <br>
        <div class="col s12 l4 m4 offset-l4 offset-m4">
          <div class="card grey lighten-1">
            <div class="card-content card-medium white-text center">
              <form action="{{ action('RemindersController@postReset') }}" method="POST">
                <div>

                  <div class="input-field col s12">
                    <input id="token" type="hidden" name="token" value="{{ $token }}" maxlength="40">
                  </div>

                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" required="" maxlength="40">
                    <label for="email">Enter Email Address</label>
                  </div>

                  <div class="input-field col s12">
                    <input id="password" type="password" name="password" required="" maxlength="40">
                    <label for="password">Enter New Password</label>
                  </div>

                  <div class="input-field col s12">
                    <input id="password_confirmation" type="password" name="password_confirmation" required="" maxlength="40">
                    <label for="password_confirmation">Confirm New Password</label>
                  </div>

                  @if(Session::has('invalid'))
                  <div class="alert-box success red-text text-darken-3">
                    <h6>{{ Session::get('invalid') }}</h6>
                  </div>
                  @endif


                </div>
                <br>
                <button class="btn waves-effect waves-light right blue darken-4" type="submit" name="action">Send</button>
                <br>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- /New password -->
   
  <!--  Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

  </body>
</html>
