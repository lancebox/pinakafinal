<!DOCTYPE html>
<html lang="en">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="../css/style.css" media="screen,projection"/>
	 <!-- Compiled and minified JavaScript -->
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
	<head>
	<meta charset="utf-8">
	</head>
	<body>

	
		<div class="row">
			<div class="card-panel col s8">
				<div class="center">
					<div class="card-image">
						<img src="../../pictures/LOGO.jpg" width="85%" height="85%">
						<h5>Password Reset</h5>
					</div>

					<h5 class="left-align"><strong>Hi,</strong></h5>
					<br>

					<h6 class="left-align">
						To reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.
					</h6>
					<h6 class="left-align">
						<i>
							This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
						</i>
					</h6>
					<br>
					<br>
				</div>
			</div>
		</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="../js/materialize.min.js"></script>
 <script type="text/javascript" src="../js/init.js"></script>
	</body>
</html>
