<?php

class AccountSettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function settings()
	{
		//
		if (Auth::user()->user_type == '0') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                return View::make('admin.settings');
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return View::make('login.login');
            } 
        }
        elseif (Auth::user()->user_type == '1') {
            
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                return View::make('cashier.settings');
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return View::make('login.login');
            } 
    	}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


		//edit account
	public function updateAccount()
	{
		// process the form here

   		// create the validation rules ------------------------
    	$rules = array(
        	'user_name'             => 'required',                        
        	'email'            => 'required|email|unique:user,email,' .Auth::user()->id,     
        	'user_contactNo'        => 'required|numeric'                  
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'email' 	=> 'Email format is invalid!',
    		'unique'	=> 'Email has already been taken!',
    		'numeric'	=> 'Field only allows numeric characters!' 

    	);

    	// do the validation ----------------------------------
    	// validate against the inputs from our form
    	$validator = Validator::make(Input::all(), $rules, $messages);

    	// check if the validator failed -----------------------
    	if ($validator->fails()) {

        	// get the error messages from the validator
        	$messages = $validator->messages();

        	// redirect our user back to the form with the errors from the validator
        	return Redirect::to('/settings')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------


			// edit
            $user = Auth::user();
            $user->user_name       = Input::get('user_name');
            $user->email           = Input::get('email');
            $user->user_contactNo  = Input::get('user_contactNo');
            

        	// save 
        	$user->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
        	Session::flash('update-success', 'Account updated!');
        	return Redirect::to('/settings');
    	}
	}


	public function changePassword() 
	{
    	$user = Auth::user();
    	$rules = array(
        	'old_password' => 'required|alphaNum',
        	'password' => 'required|alphaNum|confirmed'
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'email' 	=> 'Email format is invalid!',
    		'unique'	=> 'Email has already been taken!',
    		'numeric'	=> 'Field only allows numeric characters!',
    		'confirmed'	=> 'Password confirmation does not match!',
            'alphaNum'  => 'Field only allows alphanumeric characters!'  

    	);

    	$validator = Validator::make(Input::all(), $rules, $messages);

    	if ($validator->fails()) 
    	{
        	return Redirect::to('/settings')->withErrors($validator);
    	} 
    	else 
    	{
        	if (!Hash::check(Input::get('old_password'), $user->password)) 
        	{
        		Session::flash('password-fail', 'Incorrect password!');
            	return Redirect::to('/settings');
        	}
        	else
        	{
            	$user->password = Hash::make(Input::get('password'));
            	$user->save();
            	Session::flash('password-success', 'Password changed!');
            	return Redirect::to('/settings');
        	}
    	}
	}


}
