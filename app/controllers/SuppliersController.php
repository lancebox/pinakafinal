<?php

class SuppliersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Checks user type
		if (Auth::user()->user_type == '0') {
            //Checks user_status
        	if (Auth::user()->user_status == '1') {
            	return View::make('admin.suppliers.index');
        	}
                    
        	elseif (Auth::user()->user_status == '0') {
            	Auth::logout();
            	Session::flush();
            	Session::flash('status-error', 'User access has been revoked!');
            	return Redirect::to('/login');
        	}   
        }
        elseif (Auth::user()->user_type == '1') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                return View::make('cashier.suppliers');
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return Redirect::to('/login');
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
        	'supplier_name'             => 'required',                        
        	'supplier_email'            => 'required|email|unique:supplier',     
        	'supplier_contactNo'        => 'required|numeric',
        	'supplier_address'          => 'required'                       
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
        	return Redirect::to('/suppliers')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------


        	// create the data 
			$createSupplier = new Supplier;
			$createSupplier->supplier_name      = Input::get('supplier_name');
			$createSupplier->supplier_email     = Input::get('supplier_email');
			$createSupplier->supplier_contactNo = Input::get('supplier_contactNo');
			$createSupplier->supplier_address   = Input::get('supplier_address');
			


        	// save 
        	$createSupplier->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
            Session::flash('store-success', 'Supplier added!');
        	return Redirect::to('/suppliers');
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
				$supplier = Supplier::find($id);
				return View::make('admin.suppliers.edit')
					->with('supplier', $supplier);
        	}
                    
        	elseif (Auth::user()->user_status == '0') {
            	Auth::logout();
            	Session::flush();
            	Session::flash('status-error', 'User access has been revoked!');
            	return Redirect::to('/login');
        	}  
        }
        elseif (Auth::user()->user_type == '1') {
            return Redirect::to('/cashierSuppliers');
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
        	'supplier_name'             => 'required',                        
        	'supplier_email'            => 'required|email|unique:supplier,supplier_email,' .$id,        
        	'supplier_contactNo'        => 'required|numeric',
        	'supplier_address'          => 'required'                       
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
        	return Redirect::to('/suppliers/' . $id . '/edit')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------


        	// create the data 
            $supplier = Supplier::find($id);
            $supplier->supplier_name       = Input::get('supplier_name');
            $supplier->supplier_email      = Input::get('supplier_email');
            $supplier->supplier_contactNo = Input::get('supplier_contactNo');
            $supplier->supplier_address = Input::get('supplier_address');

			


        	// save 
        	$supplier->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
            Session::flash('update-success', 'Supplier updated!');
        	return Redirect::to('/suppliers/' . $id . '/edit');
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
