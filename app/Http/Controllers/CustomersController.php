<?php namespace App\Http\Controllers;

use App\Entities\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;


class CustomersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /phrases
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::all();

		return view('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /phrases/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('customers.create');
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
			'name' => 'required',
		]);

		$data = $request->only('name');


		Customer::create($data);

		return redirect('customers');

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
		$customer = Customer::findOrFail($id);

		return view('customers.edit', compact('customer'));
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
		$customer = Customer::findOrFail($id);


		$this->validate($request, [
			'name' => 'required',
		]);

		$data = $request->only('name');

		$customer->update($data);

		return redirect('customers');

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
		Customer::destroy($id);

		return redirect('customers');
	}

}