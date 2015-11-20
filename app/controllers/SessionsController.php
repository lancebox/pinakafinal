<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showLogin()
	{
		if (Auth::check()) {

			//Checks user_status
			if (Auth::user()->user_status == '1') {
				//Checks user_type
				if (Auth::user()->user_type == '0') {
					return Redirect::to('/dashboard');
				}
				elseif (Auth::user()->user_type == '1') {
					return Redirect::to('/cashier');
				}

			}
					
			elseif (Auth::user()->user_status == '0') {
				return View::make('login.login');
			}	
			
		}
		//Display Login Form
		return View::make('login.login');
	}

	public function doLogin() 
	{

  		// process the form here

   		// create the validation rules ------------------------
    	$rules = array(                     
        	'email'            		=> 'required|email',     
        	'password'              => 'required'
                      
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'email' 	=> 'Email format is invalid!'

    	);

    	// do the validation ----------------------------------
    	// validate against the inputs from our form
    	$validator = Validator::make(Input::all(), $rules, $messages);

    	// check if the validator failed -----------------------
    	if ($validator->fails()) {

        	// get the error messages from the validator
        	$messages = $validator->messages();

        	// redirect our user back to the form with the errors from the validator
        	return Redirect::to('/login')
            	->withErrors($validator)
            	->withInput(Input::except('password'));

    	} else {
        	// validation successful ---------------------------


			$input = Input::all();
 
			$attempt = Auth::attempt( array('email' => $input['email'], 'password' => $input['password']) );

			if($attempt) {
				
				//Checks user_status
				if (Auth::user()->user_status == '1') {
					//Checks user_type
					if (Auth::user()->user_type == '0') {
						return Redirect::to('/dashboard');
					}
					elseif (Auth::user()->user_type == '1') {
						return Redirect::to('/cashier');
					}

				}
					
				elseif (Auth::user()->user_status == '0') {
					Session::flash('status-error', 'User access has been revoked!');
					return Redirect::back()->withInput();
				}							

			} 

			else {
				Session::flash('credential-error', 'Email or password is incorrect!');
				return Redirect::back()->withInput();
			}
    	}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doLogout()
	{
		//
		Auth::logout();
		Session::flush();
		return Redirect::to('login');
	}

}




