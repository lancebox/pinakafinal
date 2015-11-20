<?php

class SalesController extends \BaseController {

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
            return View::make('admin.sales.sales');
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
		//
		$sale = Sale::find($id);
		$sale->sales_status    = Input::get('sales_status');
        $sale->save();


        if ($sale->sales_status == 0) {
            return Redirect::to('returns');
        } elseif ($sale->sales_status ==1) {
        	return Redirect::to('sales');
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
