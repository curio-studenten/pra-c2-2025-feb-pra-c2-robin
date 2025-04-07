<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller

{
    public function showManuals()
    {

        $popularManuals = Manual::where('is_popular', 1)->get();

        return view('homepage.blade.php', compact('popularManuals'));
    }
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);
        $manual->increment('views');

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function trackClick($manual_id)
    {
        // Find the manual by ID
        $manual = Manual::findOrFail($manual_id);

        // Increment the click count
        $manual->increment('teller') += 1;

        $manual->save();



        // Redirect the user to the manual's actual URL
        return redirect($manual->url);
    }

    public function contact()
    {
        return view('pages.contactformulier');
    }
}

