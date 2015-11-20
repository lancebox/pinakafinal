<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function daily()
	{
		//
		if (Auth::user()->user_type == '0') {
        	//Checks user_status
        	if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard.daily');
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function weekly()
	{
		//
		if (Auth::user()->user_type == '0') {
        	//Checks user_status
        	if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard.weekly');
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function monthly()
	{
		//
		if (Auth::user()->user_type == '0') {
        	//Checks user_status
        	if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard.monthly');
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function stocks()
	{
		//
		if (Auth::user()->user_type == '0') {
        	//Checks user_status
        	if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard.stocks');
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function shelfLife()
	{
		//
		if (Auth::user()->user_type == '0') {
        	//Checks user_status
        	if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard.shelflife');
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

        public function index()
    {
        //
        if (Auth::user()->user_type == '0') {
            //Checks user_status
            if (Auth::user()->user_status == '1') {
            return View::make('admin.dashboard');
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



}
