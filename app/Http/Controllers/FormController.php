<?php

namespace App\Http\Controllers;

use App\Order;
use App\PlaceToPay\PlaceToPayConnection;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    /**
     * @param Product $product
     * @return Application|Factory|View
     */
    public function index(Product $product): view
    {
        return view('form', compact('product'));
    }

    public function pay(Request $request, Product $product)
    {
        $connection = new PlaceToPayConnection();
        $response = $connection->createRequest($request, $product);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->request_id = $response['requestId'];
        $order->reference = $connection->reference;
        $order->description = $product->name;
        $order->total = $product->price;
        $order->status = $response['status']['status'];
        $order->save();

        return redirect($response['processUrl']);
    }
}
