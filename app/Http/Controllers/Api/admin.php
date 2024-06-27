<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;

class admin extends Controller
{
    public function getCustomer(Request $r)
    {
        $customer = Customer::find($r->id);
        return response()->json([
            'customer' => $customer,
            'msg' => 'success'
        ]);
    }

    public function getProduct(Request $r)
    {
        $product = Product::find($r->id);
        return response()->json([
            'product' => $product,
            'msg' => 'success'
        ]);
    }
}
