<?php

namespace App\Http\Controllers;

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
}
