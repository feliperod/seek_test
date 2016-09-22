<?php namespace App\Http\Controllers;

use App\Entities\AdType;
use App\Http\Requests;
use Illuminate\Http\Request;


class AdTypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /phrases
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index()
	{
		$adTypes = AdType::all();

		return view('ad_types.index', compact('adTypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /phrases/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ad_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /phrases
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
				'code' => 'required',
				'name' => 'required',
				'price' => 'required',
		]);

		$data = $request->only('code', 'name','price');

		AdType::create($data);

		return redirect('ad-types');

	}

	/**
	 * Display the specified resource.
	 * GET /phrases/{id}
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
	 * GET /phrases/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adType = AdType::findOrFail($id);

		return view('ad_types.edit', compact('adType'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /phrases/{id}
	 *
	 * @param Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$adType = AdType::findOrFail($id);


		$this->validate($request, [
			'code' => 'required',
			'name' => 'required',
			'price' => 'required',
		]);

		$data = $request->only('code', 'name','price');

		$adType->update($data);

		return redirect('ad-types');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /phrases/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		AdType::destroy($id);

		return redirect('ad-types');
	}

}