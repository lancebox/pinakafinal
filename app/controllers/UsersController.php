<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::user()->user_type == '0') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                return View::make('admin.users.index');
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return View::make('login.login');
            }  
        }
        elseif (Auth::user()->user_type == '1') {
            return Redirect::to('/cashier');
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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// process the form here

   		// create the validation rules ------------------------
    	$rules = array(
        	'user_name'             => 'required',                        
        	'email'                 => 'required|email|unique:user',     
        	'password'              => 'required|alphaNum',
        	'user_contactNo'        => 'required|numeric',
            'user_type'             => 'required'                       
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'email' 	=> 'Email format is invalid!',
    		'unique'	=> 'Email has already been taken!',
    		'numeric'	=> 'Field only allows numeric characters!',
            'alphaNum'  => 'Field only allows alphanumeric characters!' 

    	);

    	// do the validation ----------------------------------
    	// validate against the inputs from our form
    	$validator = Validator::make(Input::all(), $rules, $messages);

    	// check if the validator failed -----------------------
    	if ($validator->fails()) {

        	// get the error messages from the validator
        	$messages = $validator->messages();

        	// redirect our user back to the form with the errors from the validator
        	return Redirect::to('/users')
            	->withErrors($validator)
            	->withInput(Input::except('password'));

    	} else {
        	// validation successful ---------------------------


        	// create the data 
        	$createUser = new User;
        	$createUser->user_name      = Input::get('user_name');
        	$createUser->email          = Input::get('email');
        	$createUser->password       = Hash::make(Input::get('password'));
        	$createUser->user_contactNo = Input::get('user_contactNo');
            $createUser->user_type      = Input::get('user_type');
        	$createUser->user_status    = '1';

        	// save 
        	$createUser->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
            Session::flash('store-success', 'Account added!');
        	return Redirect::to('/users');
    	}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
  

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //
        if (Auth::user()->user_type == '0') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                $user = User::find($id);
                return View::make('admin.users.edit')
                    ->with('user', $user);
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return Redirect::to('/login');
            }  
        }
        elseif (Auth::user()->user_type == '1') {
            return Redirect::to('/cashier');
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// process the form here

   		// create the validation rules ------------------------
    	$rules = array(
        	'user_name'             => 'required',                        
        	'email'                 => 'required|email|unique:user,email,' .$id,     
        	'user_contactNo'        => 'required|numeric',
        	'user_status'           => 'required'                       
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
        	return Redirect::to('/users/' . $id . '/edit')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------


			// edit
            $user = User::find($id);
            $user->user_name       = Input::get('user_name');
            $user->email           = Input::get('email');
            $user->user_contactNo  = Input::get('user_contactNo');
            $user->user_status     = Input::get('user_status');
            

        	// save 
        	$user->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
            Session::flash('update-success', 'Account updated!');
        	return Redirect::to('/users/' . $id . '/edit');
    	}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
    
	}


}
