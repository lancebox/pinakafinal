<?php

class addDeductProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
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
        	'addProduct'	=> 'numeric|min:0|max:1000000',
        	'deductProduct'	=> 'numeric|min:0|max:1000000'                       
    	);

    	//custom messages
    	$messages = array(
    		'numeric'	=> 'Field only allows numeric characters!' 

    	);

    	// do the validation ----------------------------------
    	// validate against the inputs from our form
    	$validator = Validator::make(Input::all(), $rules, $messages);

    	// check if the validator failed -----------------------
    	if ($validator->fails()) {

    		$product = Product::find($id);


        	// redirect our user back to the form with the errors from the validator
        	if ($product->product_type == 0) {
            	return Redirect::to('np');
        	} elseif ($product->product_type ==1) {
        		return Redirect::to('p');
        	}

    	} else {
        	// validation successful ---------------------------


			// edit
			$addProduct = Input::has('addProduct') ? Input::get('addProduct') : null;
			$deductProduct = Input::has('deductProduct') ? Input::get('deductProduct') : null;


			$product = Product::find($id);
			$product->product_quantity = Input::get('product_quantity') + $addProduct - $deductProduct;
            

        	// save 
        	$product->save();


        	// redirect ----------------------------------------
        	// redirect our user back to the form so they can do it all over again
        	if ($product->product_type == 0) {
            	return Redirect::to('np');
        	} elseif ($product->product_type ==1) {
        		return Redirect::to('p');
        	}
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
