<?php namespace App\Http\Controllers;

use App\Entities\AdType;
use App\Entities\Customer;
use App\Entities\PricingRule;
use App\Http\Requests;
use Illuminate\Http\Request;


class PricingRulesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /phrases
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index()
	{
		$pricingRules = PricingRule::with(['customer', 'adtype'])->get();

		return view('pricing_rules.index', compact('pricingRules'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /phrases/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = Customer::all(['id', 'name']);
		$adTypes = AdType::all(['id','code', 'name']);

		return view('pricing_rules.create', compact('customers','adTypes'));
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
				'customer_id' => 'required',
				'ad_type_id' => 'required',
				'rule_type' => 'required',
				'rule' => 'required',
		]);

		$data = $request->only('customer_id', 'ad_type_id','rule_type', 'rule');


		PricingRule::create($data);

		return redirect('pricing-rules');

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
		$pricingRule = PricingRule::findOrFail($id);
		$customers = Customer::all(['id', 'name']);
		$adTypes = AdType::all(['id','code', 'name']);

		return view('pricing_rules.edit', compact('pricingRule', 'customers', 'adTypes'));
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
		$pricingRule = PricingRule::findOrFail($id);


		$this->validate($request, [
			'customer_id' => 'required',
			'ad_type_id' => 'required',
			'rule_type' => 'required',
			'rule' => 'required',
		]);

		$data = $request->only('customer_id', 'ad_type_id','rule_type', 'rule');

		$pricingRule->update($data);

		return redirect('pricing-rules');

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
		PricingRule::destroy($id);

		return redirect('pricing-rules');
	}

}