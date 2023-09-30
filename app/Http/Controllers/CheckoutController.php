<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function checkout()
    {
        return view('app.checkout');
    }

    public function placeOrder(Request $request)
    {

        $order = $this->orderRepository->storeOrderDetails($request->all());

        if ($order) {
            \Cart::clear();
            return view('app.success', compact('order'));
        }

        return redirect()->back()->with('message', 'Oder not placed!');
    }
}
