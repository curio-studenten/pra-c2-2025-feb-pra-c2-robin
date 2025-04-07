<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{

    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);
        $top10 = Manual::orderBy('teller', 'desc')->take(10)->get();
        $top5 = Manual::where('brand_id', $brand_id)->orderBy('teller', 'desc')->take(5)->get();
        $tellerCount = Manual::pluck('teller')->first();

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "top10" => $top10,
            "top5" => $top5,
            "tellerCount" => $tellerCount
        ]);

    }
    public function showByLetter($letter)
    {
        $brands = Brand::where('name', 'like', $letter . '%')->get(); // Fetch brands that start with the given letter
        return view('brands.show', compact('brands', 'letter'));
    }

}
 