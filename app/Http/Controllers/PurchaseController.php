<?php

namespace App\Http\Controllers;

use App\Order;
use App\PlaceToPay\PlaceToPayConnection;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(string $reference)
    {
        $connection = new PlaceToPayConnection();

        $order = Order::where('reference', $reference)->get();

        $requestInformation =  $connection->getRequestInformation($order[0]['request_id']);

        $order->toQuery()->update([
            'status' => $requestInformation['status']['status']
        ]);

        return view('purchaseResult', compact('requestInformation'));
    }
}
