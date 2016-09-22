<?php namespace App\Http\Controllers;

use App\Entities\Order;
use App\Http\Requests;
use Illuminate\Http\Request;


class OrdersController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 * GET /phrases/create
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::with('customer')->get();

		return view('orders.index', compact('orders'));
	}

	public function destroy($id)
	{
		Order::destroy($id);

		return redirect('orders');
	}

}