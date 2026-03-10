<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function generate(Request $request)
    {
        $product = $request->input("product");

        return response()->json([
            "product" => $product,
            "content" => "Demo marketing content for $product"
        ]);
    }
}
