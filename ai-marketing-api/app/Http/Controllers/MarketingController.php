<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\MarketingGeneratorAction;

class MarketingController extends Controller
{
    // public function generate(Request $request)
    // {
    //     $product = $request->input("product");

    //     return response()->json([
    //         "product" => $product,
    //         "content" => "Demo marketing content for $product"
    //     ]);
    // }

    public function generate(Request $request, MarketingGeneratorAction $action)
    {
        $platform = $request->input("platform");
        $product = $request->input("product");
        $description = $request->input("description");

        $content = $action->execute($platform, $product, $description);

        return response()->json([
            "content" => $content
        ]);
    }
}