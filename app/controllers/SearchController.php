<?php

class SearchController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $term
	 * @return Response
	 */
	public function show($term)
	{
		$airplanes = DB::table('product')
			->where('product_name', 'LIKE', '%' . $term . '%')
			->get();

		return Response::json($airplanes, 200);
	}

}
