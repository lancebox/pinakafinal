<?php

class CashierController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Checks user_status
		if (Auth::user()->user_status == '1') {
			return View::make('cashier.cashier')->with('products',Cart::contents());
		}
					
		elseif (Auth::user()->user_status == '0') {
			Auth::logout();
			Session::flush();
			Session::flash('status-error', 'User access has been revoked!');
			return Redirect::to('/login');
		}
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function ACart()
	{
		// process the form here

   		// create the validation rules ------------------------
    	$rules = array(
        	'product_name'                 => 'required',                        
        	'product_quantity'             => 'required|numeric'                     
    	);

    	//custom messages
    	$messages = array(
    		'required' 	=> 'Field is required!',
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
        	return Redirect::to('/cashier')->with('products',Cart::contents())
            	->withErrors($validator);

    	} else {
        	// validation successful ---------------------------


        	//adding to cart 
            $time = date('Y-m-d H:i:s');
            $name = Input::get('product_name');
            $price =  DB::table('product')->where('product_name',$name)->pluck('product_retailPrice');
            $products = array(
                'id' =>$time,
                'name'=> $name,
                'price' => $price,
                'quantity'=>Input::get('product_quantity')
            );
			


        	// Added to cart
        	Cart::insert($products);  


        	// redirect ----------------------------------------
        	// redirect our user back to the cashier so they can do it all over again
            return Redirect::to('/cashier')->with('products',Cart::contents());
    	}

	}

	public function remove()
	{
	    $id = Input::get('identity');
        $item = Cart::item($id);
        $item->remove();

       return Redirect::to('/cashier')->with('products',Cart::contents());
	}

		public function edit()
	{

        $id = Input::get('identity');
        $quantity = Input::get('quantity');
        foreach (Cart::contents() as $item) {
            $item->id = $id; //find item w/ identifier
            $item->quantity = $quantity;
        }
     
     

        

       return Redirect::to('/cashier')->with('products',Cart::contents());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function void()
	{
		Cart::destroy();

		return Redirect::to('/cashier')->with('products',Cart::contents());

	}

	   public function pay()
    {       
          
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            $time = date('H:i', strtotime(Carbon::now()));
            $ddate = Carbon::now();
            $date = new DateTime($ddate);
            $week = $date->format("W");
            $sales = new Sale;
            $sales->user_name = Auth::user()->user_name;
            $sales->sales_date = date('Y-m-d');
            $sales->month = $month;
            $sales->year = $year;
            $sales->week = $week;
            $sales->time = $time;
            $sales->sales_status = 1;
            $sales->sales_finalTotal = Cart::total();
            $sales->sales_cashTender = Input::get('num2');
            $sales->save();

            foreach (Cart::contents() as $item)
        {
            $name = $item->name;
            $cart = $item->quantity;
            $quantity = DB::table('product')->where('product_name',$name)->pluck('product_quantity');
            $update = $quantity - $cart;
            $id = DB::table('product')->where('product_name',$name)->pluck('id');
            $inventory = Product::find($id);
            $inventory->product_quantity = $update;
            $inventory->save();

            /*
            $time = date('Y-m-d H:i:s');
            $time2 = time();
            $sales = new Sale;
            $sales->user_id = 1;
            $sales->sales_status = 1;
            $sales->sales_id = $time2;
            $sales->sales_cashTender = Input::get('num2');
            $sales->sales_finalTotal = Cart::total();
            $sales->product_id = DB::table('product')->where('product_name',$name)->pluck('id');
            $sales->product_quantity = $item->quantity;
            $sales->sales_date = $time;
            $sales->save();
            */
   
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            $time = date('H:i', strtotime(Carbon::now()));
            $ddate = Carbon::now();
            $date = new DateTime($ddate);
            $week = $date->format("W");
            $today = date('Y-m-d', strtotime(Carbon::now()));
            $salesd = new SaleDetail;
            $salesd->sales_id = DB::table('sales')->where('time',$time)->pluck('id');
            $salesd->product_id = DB::table('product')->where('product_name',$name)->pluck('id');
            $salesd->product_quantity = $item->quantity;
            $salesd->sales_date = $today;
            $salesd->month = $month;
            $salesd->year = $year;
            $salesd->week = $week;
            $salesd->time = $time;
            $salesd->product_name = $name;
            $salesd->product_retailPrice = DB::table('product')->where('product_name',$name)->pluck('product_retailPrice');
            $salesd->saledetail_finalprice = 1;
            $salesd->save();




        }
            
        Cart::destroy();
        return Redirect::to('/cashier')->with('products',Cart::contents());
    }


}
