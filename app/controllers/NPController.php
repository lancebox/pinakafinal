<?php

class NPController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //
        if (Auth::user()->user_type == '0') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
                return View::make('admin.products.np');
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
                return View::make('cashier.np');
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
        if (Auth::user()->user_type == '0') {

            //Checks user_status
            if (Auth::user()->user_status == '1') {
            return View::make('admin.products.createNP');
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return Redirect::to('/login');
            }              
        }
        elseif (Auth::user()->user_type == '1') {
            return Redirect::to('/cashierNP');
        }
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
        	'product_name'        	=> 'required|unique:product|max:40',                        
        	'product_supplier'     	=> 'required',
        	'product_description'	=> 'max:100',     
        	'product_supplyPrice'  	=> 'required|numeric|max:1000000',
        	'product_retailPrice'  	=> 'required|numeric|max:1000000',
        	'product_quantity'     	=> 'required|numeric|max:1000000',
        	'product_reorderPoint' 	=> 'required|numeric|max:1000000',
        	'product_reorderAmount'	=> 'required|numeric|max:1000000'                       
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'unique'	=> 'Product name has already been taken!',
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
        	return Redirect::to('/np/create')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------


        	// create the data 
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            $time = date('H:i', strtotime(Carbon::now()));
            $ddate = Carbon::now();
            $date = new DateTime($ddate);
            $week = $date->format("W");
            $addNP = new Product;
            $addNP->product_name = Input::get('product_name');
            $addNP->product_supplier = Input::get('product_supplier');
            $addNP->product_description = Input::get('product_description');
            $addNP->product_type = '0';
            $addNP->product_status = '1';
            $addNP->date = $date;
            $addNP->month = $month;
            $addNP->year = $year;
            $addNP->week = $week;
            $addNP->time = $time;
            // Pricing
            $supplyprice = Input::get('product_supplyPrice');
            $retailprice = Input::get('product_retailPrice');   
            $addNP->product_supplyPrice = $supplyprice;
            $addNP->product_retailPrice = $retailprice;
            $addNP->product_MarkUpPrice = $retailprice - $supplyprice;
        
            // Inventory 
            $addNP->product_quantity = Input::get('product_quantity');
            $addNP->product_reorderPoint = Input::get('product_reorderPoint');
            $addNP->product_reorderAmount = Input::get('product_reorderAmount');

            // save 
            $addNP->save();

        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
        	return Redirect::to('/np');
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
            $product = Product::find($id);
            return View::make('admin.products.editNP')
                ->with('product', $product);
            }
                    
            elseif (Auth::user()->user_status == '0') {
                Auth::logout();
                Session::flush();
                Session::flash('status-error', 'User access has been revoked!');
                return Redirect::to('/login');
            } 
        }
        elseif (Auth::user()->user_type == '1') {
            return Redirect::to('/cashierNP');
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
        	'product_name'        	=> 'required|max:40|unique:product,product_name,' .$id,                        
        	'product_supplier'     	=> 'required',
        	'product_description'	=> 'max:100',     
        	'product_supplyPrice'  	=> 'required|numeric|max:1000000',
        	'product_retailPrice'  	=> 'required|numeric|max:1000000',
        	'product_quantity'     	=> 'required|numeric|max:1000000',
        	'product_reorderPoint' 	=> 'required|numeric|max:1000000',
        	'product_reorderAmount'	=> 'required|numeric|max:1000000'                           
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
    		'unique'	=> 'Product name has already been taken!',
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
        	return Redirect::to('/np/' . $id . '/edit')
            	->withErrors($validator)
            	->withInput(Input::all());

    	} else {
        	// validation successful ---------------------------

			$product = Product::find($id);
        	$product->product_name = Input::get('product_name');
        	$product->product_supplier = Input::get('product_supplier');
        	$product->product_description = Input::get('product_description');
        	$product->product_status = Input::get('product_status');
        	$product->product_supplyPrice = Input::get('product_supplyPrice');
        	$product->product_retailPrice = Input::get('product_retailPrice');
        	$product->product_reorderPoint = Input::get('product_reorderPoint');
        	$product->product_reorderAmount = Input::get('product_reorderAmount');


        	// save 
        	$product->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
            Session::flash('update-success', 'Product updated!');
        	return Redirect::to('/np/' . $id . '/edit');
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

