<?php namespace App\Http\Controllers;

use App\Entities\AdType;
use App\Entities\Customer;
use App\Entities\PricingRule;
use App\Http\Requests;
use App\Services\CheckoutService;
use Illuminate\Http\Request;


class CheckoutsController extends Controller {

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

		return view('checkouts.create', compact('customers','adTypes'));
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
				'items' => 'required',
		]);

		$customerId = $request->get('customer_id');

		$items = $request->get('items');
		$qty = $request->get('qty');

		$pricingRules = PricingRule::where('customer_id',$customerId)->get();

		$checkout = new CheckoutService($pricingRules, $customerId);

		foreach ($items as $k=>$item)
		{
			$checkout->add($item, $qty[$k]);
		}

		$checkout->total();
		
		return redirect('orders');

	}

}